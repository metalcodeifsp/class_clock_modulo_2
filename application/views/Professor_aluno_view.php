
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

      <?php

      echo form_open("Professor_Aluno/cadastrar");

      echo form_hidden("numero_curso","analize");


      foreach($nomes as $nome):

        echo form_label("$nome", "$nome");
        echo form_input(array(
          "name" => "$nome",
        ));
        echo "<br>";
      endforeach;

      echo form_button(array(
        "class" => "btn btn-primary",
        "content" => "Gerar Relatório",
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
