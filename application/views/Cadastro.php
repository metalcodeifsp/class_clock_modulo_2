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
<h1>Cadastro</h1>

<table class="table">
<tr>
  <td>
  <?php
  echo form_open("Professor_Aluno\cadastroUsuario");

  echo form_label("Nome", "nome");
  echo form_input(array(
    "name" => "nome",
    "id" => "nome",
    "class" => "form-control",
    "maxlength" => "255"
  ));
  ?>
 </td>
 <td>
 <?php
  echo form_label("Senha", "senha");
  echo form_password(array(
    "name" => "senha",
    "id" => "senha",
    "class" => "form-control",
    "maxlength" => "255"
  ));
 ?>
</td>
</tr>
<tr>


<td>
  <?php
  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Cadastrar",
    "type" => "submit"

  ));

  echo form_close();
   ?>
</td>

   <td>
<?php

  echo form_open("Professor_Aluno\index");
  echo form_button(array(
    "class" => "btn btn-primary",
    "content" => "Voltar",
    "type" => "submit"

  ));
  echo form_close();
   ?>
   </td>
</tr>
</table>
</div>
<div class="sidebar"></div>
<div id="footer"><h1></h1></div>

</body>

</html>
