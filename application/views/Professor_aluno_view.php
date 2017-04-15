<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css')?>">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="container">


    <table class="table">
      <tr>
        <td>nome do curso</td>
        <td>alunos</td>
        <td>fenc</td>
        <td>professores</td>
        <td>valor final</td>
        <td>data</td>
      </tr>
      <tr>
        <td><?=$nome_curso ?></td>
        <td><?=$alunos ?></td>
        <td><?=$fenc ?></td>
        <td><?=$professores;?></td>
        <td><?=$rel ?></td>
        <td><?=$data ?></td>
      </tr>
    </table>
    </div>
  </body>
</html>
