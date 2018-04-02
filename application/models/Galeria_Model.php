<?php

class Galeria_Model extends MY_Model 
{
  public $id;
  public $titulo;
  public $slug;
  public $imagen;
  public $categoria_id;

  // Obtiene todos los registros.
  public function get_list($inicio = 0, $limite = 100) 
  {
    $this->db->limit($limite, $inicio);
    $this->db->order_by('id', 'desc');

    $result = $this->db->get('imagen');
    return $result->result();
  }

  // Busca un recurso.
  public function get_where($name, $value) 
  {
    if (is_null($value)) return $this;

    $this->db->where($name, $value);
    $result = $this->db->get('imagen');
    return $result->first_row(self::class);
  }

  // Guarda el recurso.
  public function save() 
  {
    if (is_null($this->id)) {
      return $this->db->insert('imagen', $this);
    }

    $this->db->where('id', (int) $this->id);
    return $this->db->update('imagen', $this);
  }

  // Elimina el recurso por su identificador.
  public function delete() 
  {
    $this->db->where('id', (int) $this->id);
    return $this->db->delete('imagen');
  }

  /* ------------------------------------------------------------ */

  // Numero de registros.
  public function count()
  {
    $result = $this->db->query('SELECT COUNT(id) AS count FROM imagen');
    $row = $result->row_array();

    return (int) $row['count']; // acceso al atributo.
  }

  public function is_unique($name, $value) {
    $this->db->limit(1);
    $this->db->where($name, $value);

    if (!is_null($this->id)) {
      $this->db->where('id !=', $this->id);
    }

    return $this->db->get('imagen')->num_rows() === 0;
  }

  /* ------------------------------------------------------------ */
}
