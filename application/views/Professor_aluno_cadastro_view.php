  <!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css')?>">
  <style>

  #header{
    width: 60%;
    height: 150px;
    float: left;
  }
  #emp{
    width: 40%;
    height: 150px;
    float: left;
  }

  #container{
    width: 61%;
    min-height: 500px;
    height: auto;
    float: left;
  }
  .sidebar{
    width: 19%;
    height: 550px;
    float: left;
  }
  #footer{
    width: 100%;
    height: 100px;
    float: left;
  }

  </style>
  </head>

  <body>

  <div id="emp"></div>
  <div id="header"><img src="<?= base_url('img/Marca_IFSP.jpg')?>"/></div>
  <div class="sidebar"></div>
  <div id="container">
    <br><br>
<h1>Cadastro</h1>
<?php
 $nomes = array();


foreach ($cursos as $curso) {
  array_push($nomes, $curso['nome']);
}

?>


<table class="table">
  <tr>
    <td><?php echo form_open("Professor_Aluno/GerarRelatorio");
    echo form_button(array(
      "class" => "btn btn-primary",
      "content" => "Ver Relatórios",
      "type" => "submit"
    ));
    echo form_close(); ?></td>
<?php   echo form_open("Professor_Aluno/cadastrar"); ?>
    <td><?php echo form_button(array(
      "class" => "btn btn-primary",
      "content" => "Incluir Relatórios",
      "type" => "submit"
    )); ?></td>
  </tr>
  <tr>
    <td><b>Nome do Curso</b></td>
    <td><b>Numero de Alunos Equivalentes</b></td>
  </tr>
<?php

foreach($nomes as $nome):
echo ('
<tr>
  <td>'.$nome.'</td>
  <td>');
  echo form_input(array(
    "name" => "$nome",
    "type" => "number",
    "max" => "9999",
    "min" => "1"
  ));
  echo ('</td>
</tr>
');
endforeach;
echo('</table>');
/*
foreach ($nomes as $nome) {
$test = $this->input->post($nome);
if (is_numeric($test)) {
echo "<script type='javascript'>alert('Email enviado com Sucesso!');";
}
}
*/
echo form_close();



  ?>
</div>
  <div class="sidebar"></div>
  <div id="footer"><h1></h1></div>

  </body>

  </html>
