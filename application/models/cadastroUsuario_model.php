<?php


class cadastroUsuario_model extends CI_Model{

  public function insert_usuario($usuario)
  {
    $this->db->insert('Usuario',$usuario);

  }

  public function busca_todos_usuarios()
  {
    return $this->db->get('Usuario')->result_array();
  }


  public function busca_por_senha($senha)
  {
    $this->db->select ("*");
    $this->db->from("Usuario");
    $this->db->where("senha = ",$senha);
    $usuario = $this->db->get()->result_array();
    return $usuario;
  }


}









 ?>
