<?php

class Auth extends CI_Controller 
{

  public function __construct() 
  {
    parent::__construct();

    $this->load->model('usuario_model');
  }

  /**
   * Muestra el formulario para el login.
   */
  public function index() 
  {
    $this->load->view('admin/auth/index');
  }

  /**
   * Maneja una petición de entrada al sistema.
   * Es decir valida la entrada al usuario.
   */
  public function login() 
  {
    // Validamos los datos del formulario.
    if ($this->validate_form()) {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      if ($this->usuario_model->logear($email, $password)) {
        redirect('admin/');
      }
    }

    $this->index();
  }

  /**
   * Valida los datos del formulario.
   * @return bool
   */
  private function validate_form() 
  {
    return $this->form_validation
                    // Creamos las validaciónes del formulario.
                    ->set_rules('email', NULL, 'required|valid_email')
                    ->set_rules('password', NULL, 'required')
                    // Si el formulario no pasa la validación volvemos a mostrar el formulario. 
                    // Pero esta vez mostramos los errores.
                    ->set_error_delimiters('<small class="text-danger">', '</small>')
                    ->run();
  }

  /**
   * Cierra la sesion para el usuario.
   */
  public function logout() {
    session_destroy();
    redirect('admin/');
  }

}
