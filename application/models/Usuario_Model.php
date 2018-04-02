<?php

class Usuario_Model extends MY_Model 
{

  // Autentificación del recurso.
  public function logear($email, $password) 
  {
    $this->db->where('email', $email);
    $this->db->where('password', sha1($password));
    // Busca el registro y crea un array de la fila.
    $usuario = $this->db->get('usuario')->row_array();
    // bool <b>TRUE</b> el objeto fue construido <b>FALSE</b> no fue costruido.
    $isset = isset($usuario);
    // Guarda el "array" con los datos del "usuario" en la session.
    if ($isset) $_SESSION['usuario'] =& $usuario;

    return $isset;
  }

}
