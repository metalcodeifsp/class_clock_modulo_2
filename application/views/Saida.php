<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css')?>">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
        <tr>
          <td><?=$relatorio['nome']?></td>
          <td><?=$relatorio['result']?></td>
          <td><?=$relatorio['data']?></td>
        </tr>
      <?php endforeach; ?>

    </table>

  </body>
</html>
