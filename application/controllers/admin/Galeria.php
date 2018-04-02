<?php

class Galeria extends CI_Controller 
{

  public function __construct() 
  {
    parent::__construct();

    if (!isset($_SESSION['usuario'])) redirect('admin/auth');

    $this->load->model('categoria_model');
    $this->load->model('galeria_model');
  }

  /**
   * Muestra los registros.
   */
  public function index($indice = 0) 
  {
    $indice = is_numeric($indice) ? $indice : 0;
    $limite = 6; // Numero de registros por listado

    $this->_init_library_pagination($this->galeria_model->count(), $limite);

    $index['galerias'] = $this->galeria_model->get_list($indice, $limite);

    $this->load->view('admin/templates/header');
    $this->load->view('admin/galeria/index', $index);
    $this->load->view('admin/templates/footer');
  }

  /**
   * Muestra el formulario.
   * Se busca el registro con el "id" que recibe para editarlo.
   * Si no recibe el "id" crea un modelo vacio para agregarlo.
   * @param int $id [opcional] identificador.
   */
  public function form($id = NULL) 
  {
    $form['galeria'] = $this->galeria_model->get_where('id', $id);
    $form['categorias'] = $this->categoria_model->get_list();

    if ($this->input->method() == 'post')
      $this->save($form['galeria']);

    $this->load->view('admin/templates/header');
    $this->load->view('admin/galeria/form', $form);
    $this->load->view('admin/templates/footer');
  }

  /**
   * Guardamos el registro.
   * @param Galeria_Model $galeria modelo.
   */
  private function save(Galeria_Model $galeria) 
  { // Llenamos el modelo con los datos enviados por el formulario html.
    $galeria->titulo = $this->input->post('titulo');
    $galeria->slug = url_title(convert_accented_characters($galeria->titulo), 'dash', TRUE);
    $galeria->categoria_id = $this->input->post('categoria');

    $this->form_validation
            // Creamos las validaciónes del formulario.
            ->set_rules('titulo', NULL, 'required|max_length[44]|is_unique[imagen.titulo]')
            ->set_rules('userfile', NULL, 'callback_is_upload[userfile]')
            ->set_rules('categoria', NULL, 'required')
            // Si el formulario no pasa la validación volvemos a mostrar el formulario. 
            // Pero esta vez mostramos los errores.
            ->set_error_delimiters('<small class="text-danger">', '</small>');

    // Validamos los datos del formulario.
    if ($this->form_validation->run()) {
      $this->_init_library_upload();

      if ($this->upload->do_upload('userfile')) { // Recuperamos el nombre del archivo.
        $galeria->imagen = $this->upload->file_name;
        $this->_init_library_image($galeria->imagen);
      }

      $galeria->save(); // Guardamos.
      redirect('admin/galeria');
    }
  }

  /* ----------------------------------------------------------------------- */

  // Nuestra propia validación.
  public function is_upload($str = NULL, $field) 
  {
    if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
      return TRUE;
    }

    $this->form_validation->set_message('is_upload', 'Usted no seleccionó un archivo para enviar.');
    return FALSE;
  }

  /* ----------------------------------------------------------------------- */

  /**
   * Elimina el registro por su id.
   * @param int $id identificador.
   */
  public function delete($id) 
  {
    $this->galeria_model = $this->galeria_model->get_where('id', $id);
    // Elimina el recurso.
    if ($this->galeria_model->delete()) { // Si el recurso tenia foto. Eliminamos la foto de la carpeta.
      if (!is_null($this->galeria_model->imagen)) {
        unlink('./upload/' . $this->galeria_model->imagen);
        unlink('./upload/tumb/' . $this->galeria_model->imagen);
      }
    }
    // Redirecciona a la paguina anterior.
    redirect($_SERVER['HTTP_REFERER']);
  }

  /* ----------------------------------------------------------------------- */

  /**
   * Inicializa la Clase Upload. Para subir archivos.
   */
  private function _init_library_upload() {
    // Inicializa la Clase.
    $this->load->library('upload', array(
        // Directorio para las imagenes.
        'upload_path' => './upload/',
        // Tipos de archivos.
        'allowed_types' => 'jpg|JPG|jpeg|JPEG|png|PNG',
        // El nombre de archivo será convertido al azar en una cuerda encripta.
        'encrypt_name' => TRUE,
        // Tamaño maximo de la foto.
        'max_size' => 2000,
        // Tamaño maximo de anchura de la foto.
        'max_width' => 5000,
        // Tamaño maximo de altura de la foto.
        'max_height' => 5000
    ));
  }

  private function _init_library_image($image_name) {
    $this->load->library('image_lib', array(
        'create_thumb' => TRUE,
        'thumb_marker' => NULL,
        'source_image' => './upload/' . $image_name,
        'new_image' => './upload/tumb/' . $image_name,
        'width' => 300,
        'height' => 300
    ));

    return $this->image_lib->resize();
  }

  /**
   * Inicializa la Clase Pagination. Para paguinación.
   */
  private function _init_library_pagination($total, $limite) {
    // $route['pagina/(:num)'] = 'home/index/$1';
    // base_url().'pagina/';

    $config['base_url'] = site_url('admin/galeria/index/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limite;
    // Número de páginas que se mostraran.
    $config['num_links'] = 7;
    // Contenedor principal.
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    // Página o indice actual.
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    // Link para ir a la primera páguina.
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    // Link para ir a la páguina anterior.
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    // Link para ir a la páguina siguiente.
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    // Link para ir a la ultima páguina.
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    // Diseño para los numeros de la paguinación.
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $this->load->library('pagination', $config);
  }

}
