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
    $this->load->helper('url');

    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $dados = array('cursos' => $cursos );
    $this->load->view("cadastrar_view.php", $dados);
  }

  public function cadastrar($idCurso)
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");
    $this->load->helper('url');

    $curso = $this->Professor_Aluno_model->busca_curso($idCurso);


    $disciplinas  = $this->Professor_Aluno_model->busca_todas_disciplinas_curso($idCurso);
    $n_prof_total = 0;
    foreach ($disciplinas as $disciplina) {
      $n_prof_total += $this->Professor_Aluno_model->busca_professores($disciplina['idDisciplina']);

    }
    $nome_curso = $curso[0]['nome'];

    $fenc = $curso[0]['grau'];
    if ($fenc == 4) {
      $fenc = 20/20;
    }elseif ($fenc == 2) {
      $fenc = 20/12;
    }else {
      $fenc = 20/18;
    }
    $alunos       = 150;//temporario
    $data          = date("Y/m/d");
    $rel = ($alunos * $fenc)/$n_prof_total;

    $relatorio = array('nome' => $nome_curso,'data' => $data, 'result' => $rel );

    $this->Professor_Aluno_model->insert_relatorio($relatorio);

    $dados = array('nome_curso'=>$nome_curso,'alunos' => $alunos, 'professores' => $n_prof_total, 'fenc' => $fenc, 'data'=>$data, 'rel' => $rel );

    $this->load->view("Professor_aluno_view.php", $dados);
  }
}
