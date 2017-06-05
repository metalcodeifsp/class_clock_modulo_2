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
    $this->load->view("Saida.php", $dados);
  }

  public function cadastrar()
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");
    $this->load->helper('url');

    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $cursos = array_reverse($cursos);
    foreach ($cursos as $cursov) {

    $nome_curso = $cursov["nome"];

    $curso = $this->Professor_Aluno_model->busca_curso_nome($nome_curso);

    $disciplinas  = $this->Professor_Aluno_model->busca_todas_disciplinas_curso($curso[0]['id']);
    $n_prof_total = 0;
    foreach ($disciplinas as $disciplina) {
      $n_prof_total += $this->Professor_Aluno_model->busca_professores($disciplina['idDisciplina']);

    }

    $fenc = $curso[0]['grau'];
    if ($fenc == 4) {
      $fenc = 20/20;
    }elseif ($fenc == 2) {
      $fenc = 20/12;
    }else {
      $fenc = 20/18;
    }

    $alunos  = $this->input->post($nome_curso);
    $data    = date("Y/m/d");
    $rel = ($alunos * $fenc)/$n_prof_total;



    if ($alunos >0) {
    $relatorio = array('nome' => $nome_curso,'data' => $data, 'result' => $rel );
    $this->Professor_Aluno_model->insert_relatorio($relatorio);
    }
}

redirect('/', 'refresh');



  }
  public function GerarRelatorio()
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");
    $this->load->helper('url');

    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $relatorios =  $this->Professor_Aluno_model->busca_todos_relatorios();
    $dados = array('cursos' => $cursos, 'relatorios' => $relatorios );


    $this->load->view("Saida.php", $dados);
  }
  public function VerRelatorio()
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");
    $this->load->helper('url');

    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $relatorios =  $this->Professor_Aluno_model->busca_todos_relatorios();
    $dados = array('cursos' => $cursos, 'relatorios' => $relatorios );


    $this->load->view("Professor_aluno_view.php", $dados);
  }

  public function GerarPDF()
  {
    $this->load->DATABASE();
    $this->load->model("Professor_Aluno_model");
    $this->load->helper('url');

    $cursos = $this->Professor_Aluno_model->busca_todos_curso();
    $relatorios =  $this->Professor_Aluno_model->busca_todos_relatorios();
    $dados = array('cursos' => $cursos, 'relatorios' => $relatorios );

    include('mpdf60/mpdf.php');
    $html =   $this->load->view("Saida.php", $dados, true);


    $mpdf=new mPDF();
    $mpdf->SetDisplayMode('fullpage');
    $css = file_get_contents(base_url('css/bootstrap.css'));
    $mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html,2);
    $mpdf->Output();


  }
}
