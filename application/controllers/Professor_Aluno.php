<?php

/**
 *
 */
class Professor_Aluno extends CI_Controller
{

  public function index()
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");

    $curso = $this->Professor_Aluno_model->busca_curso(1);//1 é temporario


    $disciplinas  = $this->Professor_Aluno_model->busca_todas_disciplinas_curso(1);//1 é temporario
    $n_prof_total = 0;
    foreach ($disciplinas as $disciplina) {
      $n_prof_total += $this->Professor_Aluno_model->busca_professores($disciplina['idDisciplina']);

    }

    $alunos       = 150;//temporario
    $nome_curso   = $curso[0]['nome'];
    $fenc         = 1;
    $ano          =2017;//temporario

    $dados = array('nome_curso'=>$nome_curso,'alunos' => $alunos, 'professores' => $n_prof_total, 'fenc' => $fenc, 'ano'=>$ano );

    $this->load->view("Professor_aluno_view.php", $dados);
  }
}
