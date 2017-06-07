<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="container">
      <img src="<?= base_url('img/Marca_IFSP.jpg')?>"/>
      <br></br>
    <h1>Lista dos Relatórios</h1>

    <table class="table">
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

    </table>
    </div>
  </body>
</html>
