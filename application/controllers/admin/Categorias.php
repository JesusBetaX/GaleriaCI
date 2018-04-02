<?php

class Categorias extends CI_Controller 
{

  public function __construct() 
  {
    parent::__construct();

    if (!isset($_SESSION['usuario'])) redirect('admin/auth');

    $this->load->model('categoria_model');
  }

  /**
   * Muestra los registros.
   */
  public function index() 
  {
    $index['categorias'] = $this->categoria_model->get_list();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/categorias/index', $index);
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
    $form['categoria'] = $this->categoria_model->get_where('id', $id);

    if ($this->input->method() == 'post')
      $this->save($form['categoria']);

    $this->load->view('admin/templates/header');
    $this->load->view('admin/categorias/form', $form);
    $this->load->view('admin/templates/footer');
  }

  /**
   * Guardamos el registro.
   * @param Categoria_Model $categoria modelo.
   */
  private function save(Categoria_Model $categoria) 
  { // Llenamos el modelo con los datos enviados por el formulario html.
    $categoria->nombre = $this->input->post('nombre');
    $categoria->slug = url_title(convert_accented_characters($categoria->nombre), 'dash', TRUE);

    $this->form_validation
            // Creamos las validaciónes del formulario.
            ->set_rules('nombre', NULL, 'required|max_length[44]|is_unique[categoria.nombre]')
            // Si el formulario no pasa la validación volvemos a mostrar el formulario. 
            // Pero esta vez mostramos los errores.
            ->set_error_delimiters('<small class="text-danger">', '</small>');

    // Validamos los datos del formulario.
    if ($this->form_validation->run()) { // Guardamos.
      $categoria->save();
      redirect('admin/categorias');
    }
  }

  /**
   * Elimina el registro por su id.
   * @param int $id identificador.
   */
  public function delete($id) 
  {
    $this->categoria_model->delete($id);
    redirect('admin/categorias');
  }

}
