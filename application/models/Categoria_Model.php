<?php

class Categoria_Model extends MY_Model 
{

  public $id;
  public $nombre;
  public $slug;

  // Obtiene todos los registros.
  public function get_list() 
  {
    $result = $this->db->get('categoria');
    return $result->result();
  }

  // Busca un recurso.
  public function get_where($name, $value) 
  {
    if (is_null($value)) return $this;

    $this->db->where($name, $value);
    $result = $this->db->get('categoria');
    return $result->first_row(self::class);
  }

  // Busca las galerias por categoria.
  public function get_galerias($slug) 
  {
    $this->db->select('imagen.*');
    $this->db->from('imagen');
    $this->db->join('categoria', 'imagen.categoria_id = categoria.id');
    $this->db->where('categoria.slug', $slug);

    $result = $this->db->get();
    return $result->result();
  }

  // Guarda el recurso.
  public function save() 
  {
    if (is_null($this->id)) {
      return $this->db->insert('categoria', $this);
    }

    $this->db->where('id', (int) $this->id);
    return $this->db->update('categoria', $this);
  }

  // Elimina el recurso por su identificador.
  public function delete($id) 
  {
    $this->db->where('id', (int) $id);
    return $this->db->delete('categoria');
  }

}
