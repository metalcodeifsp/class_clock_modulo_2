<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php $rel = ($alunos * $fenc)/$professores; ?>
    <div class="container">


    <table class="table">
      <tr>
        <td>nome do curso</td>
        <td>alunos</td>
        <td>fenc</td>
        <td>professores</td>
        <td>valor final</td>
        <td>ano</td>
      </tr>
      <tr>
        <td><?=$nome_curso ?></td>
        <td><?=$alunos ?></td>
        <td><?=$fenc ?></td>
        <td><?=$professores;?></td>
        <td><?=$rel ?></td>
        <td><?=$ano ?></td>
      </tr>
    </table>
    </div>
  </body>
</html>
