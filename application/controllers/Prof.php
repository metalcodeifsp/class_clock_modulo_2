<?php

/**
 *
 */
class Prof extends CI_Controller
{

  public function index()
  {
    $this->load->DATABASE();
    $this->load->helper('array');
    $this->load->model("Prof_model");

    $curso = $this->Prof_model->busca_curso(1);//1 é temporario


    $disciplinas  = $this->Prof_model->busca_todas_disciplinas_curso(1);//1 é temporario
    $n_prof_total = 0;
    foreach ($disciplinas as $disciplina) {
      $n_prof_total += $this->Prof_model->busca_professores($disciplina['idDisciplina']);

    }

    $alunos       = 150;//temporario
    $nome_curso   = $curso[0]['nome'];
    $fenc         = $curso[0]['fenc'];
    $ano          =2017;//temporario

    $dados = array('nome_curso'=>$nome_curso,'alunos' => $alunos, 'professores' => $n_prof_total, 'fenc' => $fenc, 'ano'=>$ano );

    $this->load->view("Prof.php", $dados);
  }
}
