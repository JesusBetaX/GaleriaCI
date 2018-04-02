<?php

class Categoria extends CI_Controller 
{

  public function __construct() 
  {
    parent::__construct();

    $this->load->model('categoria_model');
  }

  public function index($slug = FALSE) 
  {
    $header['categorias'] = $this->categoria_model->get_list();
    $index['categoria'] = $this->categoria_model->get_where('slug', $slug);
    $index['galerias'] = $this->categoria_model->get_galerias($slug);

    $this->load->view('templates/header', $header);
    $this->load->view('categorias/index', $index);
    $this->load->view('templates/footer');
  }

}
