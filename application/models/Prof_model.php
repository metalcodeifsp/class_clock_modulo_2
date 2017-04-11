<?php

/**
 *
 */
class Prof_model extends CI_Model
{

  public function busca_todas_disciplinas_curso($idCurso)
  {

               $this->db->select ("idDisciplina");
               $this->db->from("Curso_tem_disciplina");
               $this->db->where("idCurso = ",$idCurso);
$disciplinas = $this->db->get()->result_array();


            return $disciplinas;
    }

  public function busca_professores($disciplina)
    {
                    $this->db->select ("*");
                    $this->db->from("Professor_Leciona_Diciplina");
                    $this->db->where("idDisciplina = ",$disciplina);
      $disciplina = $this->db->get()->result_array();


      $n_prof=0;
      foreach ($disciplina as $professor) {

      $this->db->select ("idContrato");
      $this->db->from("professor");
      $this->db->where("id = ",$professor["idProfessor"]);
      $contrato = $this->db->get()->result_array();

      if ($contrato[0]['idContrato']==1) {
        $n_prof+=1;
      }else {
      $n_prof+=0.5;
      }

      }
      return $n_prof;
    }
    public function busca_curso($idCurso)
    {
      $this->db->where("id",$idCurso);
      return $this->db->get('curso')->result_array();
    }


  }
