<?php

class Galeria extends CI_Controller 
{

  public function __construct() 
  {
    parent::__construct();

    $this->load->model('categoria_model');
    $this->load->model('galeria_model');
  }

  public function index($indice = 0) 
  {
    $indice = is_numeric($indice) ? $indice : 0;
    $limite = 6; // Numero de registros por listado

    $this->_init_library_pagination($this->galeria_model->count(), $limite);

    $header['categorias'] = $this->categoria_model->get_list();
    $index['galerias'] = $this->galeria_model->get_list($indice, $limite);

    $this->load->view('templates/header', $header);
    $this->load->view('galeria/index', $index);
    $this->load->view('templates/footer');
  }

  public function show($slug = NULL) 
  {
    $header['categorias'] = $this->categoria_model->get_list();
    $show['galeria'] = $this->galeria_model->get_where('slug', $slug);

    $this->load->view('templates/header', $header);
    $this->load->view('galeria/show', $show);
    $this->load->view('templates/footer');
  }

  /**
   * Inicializa la Clase Pagination. Para paguinación.
   */
  private function _init_library_pagination($total, $limite) 
  {
    // Use ruteo seo en vez de index/1 use pagina/1 en el panel se muestra intacto
    // routes.php en config
    // $route['pagina/(:num)'] = 'home/index/$1';
    // y cambie base_url().'galeria/index/'; por base_url('pagina/');

    $config['base_url'] = site_url('pagina/');
    $config['total_rows'] = $total;
    $config['per_page'] = $limite;
    // Link para la primera páguina.
    $config['first_url'] = site_url();
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
    $config['first_link'] = 'Primero';
    $config['first_tag_close'] = '</li>';
    // Link para ir a la páguina anterior.
    $config['prev_tag_open'] = '<li>';
    $config['prev_link'] = '←';
    $config['prev_tag_close'] = '</li>';
    // Link para ir a la páguina siguiente.
    $config['next_tag_open'] = '<li>';
    $config['next_link'] = '→';
    $config['next_tag_close'] = '</li>';
    // Link para ir a la ultima páguina.
    $config['last_tag_open'] = '<li>';
    $config['last_link'] = 'Ultimo';
    $config['last_tag_close'] = '</li>';
    // Diseño para los numeros de la paguinación.
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $this->load->library('pagination', $config);
  }

}
