<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css')?>">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <div class="container">
<h1>Cadastro</h1>
    <?php
     $nomes = array();
    foreach ($cursos as $curso) {
      array_push($nomes, $curso['nome']);
    }
    ?>

      <br>
      <form action="#" method="post">
<select name="Color">
  <option value="">selecionar curso</option>
  <?php
  foreach($nomes as $nome => $value):
  echo '<option value="'.$nome.'">'.$value.'</option>';
  endforeach;
  ?>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['Color'];  // Storing Selected Value In Variable
print_r($selected_val);
echo "You have selected :", $selected_val;  // Displaying Selected Value
} ?>
    <?php

    echo form_open("Professor_Aluno/cadastrar");

    echo form_hidden("numero_curso",1);

    echo form_label("Numero de Alunos", "aluno");
    echo form_input(array(
      "name" => "aluno",
    ));

    echo form_button(array(
      "class" => "btn btn-primary",
      "content" => "Cadastrar",
      "type" => "submit"
    ));

    echo form_close();

      ?>

    <h1>Lista</h1>


    <table class="table">

      <tr>
        <td>nome do curso</td>
        <td>valor final</td>
        <td>data</td>
      </tr>
      <?php foreach ($relatorios as $relatorio): ?>
        <tr>
          <td><?=$relatorio['nome']?></td>
          <td><?=$relatorio['result']?></td>
          <td><?=$relatorio['data']?></td>
        </tr>
      <?php endforeach; ?>

    </table>
    </div>
  </body>
</html>
