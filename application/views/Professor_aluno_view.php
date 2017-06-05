
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
          <td><b>Numero de Alunos</b></td>
        </tr>
      <?php

      foreach($nomes as $nome):
      echo ('
      <tr>
        <td>'.$nome.'</td>
        <td>');
        echo form_input(array(
          "name" => "$nome",
        ));
        echo ('</td>
      </tr>
      ');
      endforeach;
      echo('</table>');
      echo form_close();



        ?>


      </div>
    </body>
  </html>
