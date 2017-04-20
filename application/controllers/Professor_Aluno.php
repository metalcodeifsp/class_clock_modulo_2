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
    $relatorios =  $this->Professor_Aluno_model->busca_todos_relatorios();
    $dados = array('cursos' => $cursos, 'relatorios' => $relatorios );
    $this->load->view("Professor_aluno_view.php", $dados);
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

    $alunos       = $this->input->post('n_alunos');
    print_r($alunos);
    print_r($this->input->post('n_alunos'));
    print_r(3);
    $data          = date("Y/m/d");
    $rel = ($alunos * $fenc)/$n_prof_total;

    $relatorio = array('nome' => $nome_curso,'data' => $data, 'result' => $rel );

    $this->Professor_Aluno_model->insert_relatorio($relatorio);


    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $relatorios =  $this->Professor_Aluno_model->busca_todos_relatorios();
    $dados = array('cursos' => $cursos, 'relatorios' => $relatorios );

    $this->load->view("Professor_aluno_view.php", $dados);
  }
}
