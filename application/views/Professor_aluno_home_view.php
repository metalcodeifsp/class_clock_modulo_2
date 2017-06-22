<!DOCTYPE HTML>
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
  <br></br>
<h1>Lista dos Relatórios</h1>

<table class="table">
  <tr>
    <td><?php echo form_open("Professor_Aluno/GerarPDF");
    echo form_button(array(
      "class" => "btn btn-primary",
      "content" => "Gerar PDF",
      "type" => "submit"
    ));

    echo form_close(); ?></td>

    <td></td>

    <td><?php echo form_open("Professor_Aluno/VerRelatorio");
    echo form_button(array(
      "class" => "btn btn-primary",
      "content" => "Cadastrar Relatórios",
      "type" => "submit"
    ));

    echo form_close(); ?></td>
  </tr>
  <tr>
    <td><b>Nome do Curso</b></td>
    <td><b>Relação Professor X Aluno</b></td>
    <td><b>Data do Relatório</b></td>
  </tr>
  <?php $relatorios = array_reverse($relatorios);
    foreach ($relatorios as $relatorio): ?>
    <?php  $relatorio['nome'] = str_replace("_", " ", $relatorio['nome']);
 ?>
    <tr>
      <td><?=$relatorio['nome']?></td>
      <td><?=$relatorio['result']?></td>
      <td><?=$relatorio['data']?></td>
    </tr>
  <?php endforeach; ?>
  <tr>
    <td><?php
      echo form_open("Professor_Aluno\logout");
      echo form_button(array(
        "class" => "btn btn-primary",
        "content" => "Log-off",
        "type" => "submit"

      ));
      echo form_close();
       ?></td>

    <td></td>

    <td>
 <?php
 if($dadosUsuario[0]["tipo"] == 1){
   echo form_open("Professor_Aluno\VerCadastro");
   echo form_button(array(
     "class" => "btn btn-primary",
     "content" => "Cadastrar Usuario",
     "type" => "submit"

   ));
   echo form_close();
   }
    ?>
    </td>
  </tr>
</table>
</div>
<div class="sidebar"></div>
<div id="footer"><h1></h1></div>

</body>

</html>
