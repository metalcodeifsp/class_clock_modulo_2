<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css')?>">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
     $nomes = array();
    foreach ($cursos as $curso) {
      array_push($nomes, $curso['nome']);
    }
    ?>
    <select>
    <option value="">selecionar curso</option>
    <?php
    foreach($nomes as $nome => $value):
    echo '<option value="'.$nome.'">'.$value.'</option>';
    endforeach;
    ?>
    </select>
    <form action="">
      <input type="int" name="n_alunos">
      <button type="submit" name="button"></button>
    </form>

    <?php
    $rel = $cursos[0]['id'];
    echo anchor('Professor_Aluno/cadastrar/'.$rel,'cadastrar');
     ?>


    <div class="container">

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
