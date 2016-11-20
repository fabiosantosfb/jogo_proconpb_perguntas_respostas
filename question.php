<?php require_once ('core/query.php'); ?>

<div class="row well">
<form name="resposta" class="form-horizontal" action="" method="post">
  <fieldset>
  <legend>Questão</legend>
  <div class="form-group">
    <blockquote>
      <?php  $rows = Query::selection($_GET['id']);
      header('Content-Type: text/html; charset=utf-8');
            foreach ($rows as  $row) { ?>
       <p><?= $row['pergunta'] ?></p>

       <footer class="acerto"><input name="search" type="radio" id="a" value="a"><?= $row['a'] ?></footer>
       <footer class="acerto"><input name="search" type="radio" id="b" value="b"><?= $row['b'] ?></footer>
       <footer class="acerto"><input name="search" type="radio" id="c" value="c"><?= $row['c'] ?></footer>
       <footer class="acerto"><input name="search" type="radio" id="d" value="d"><?= $row['d'] ?></footer>
       <?php } $correto = Query::selectionResposta($row['correta'], $_GET['id']);
                foreach ($correto as  $r)
                  $c=$r[$row['correta']];

        ?>
    </blockquote>
  </div>
  <!-- Button (Double) -->
  <div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-6">
      <button id="button1id" onclick='respostaCorreta("<?= $c ?>","<?=$row['correta']?>",<?= $_GET['equipe']?>,<?= $_GET['id'] ?>);' class="btn btn-success">Corrigir & Salvar</button>
      <button id="Cancelar"  class="btn btn-danger" onClick="retornarQuestion();">Cancelar</button>
  </div>
  </div>
  </fieldset>
</form>
</div>
