<?php require_once ('core/query.php'); ?>

<div class="well">
  <fieldset>
  <legend>Placar</legend>
  <div class="pontos">
      <?php  $rows = Query::selectionPontoEquipe();
            foreach ($rows as  $row) { ?>
       <p class="alert-success"><?= $row['nome_equipe'] ?></p>
       <?= $row['pontos'] ?>
       <?php }
        ?>
  </div>
  </fieldset>
</div>
