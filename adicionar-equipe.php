<?php $addPerguntas = '<li><a href="adicionar-pergunta.php">Adicionar Perguntas</a></li>'; ?>
<?php $addEquipe = '';?>
<?php require_once ('view/partlals/header.php') ?>

<form class="form-horizontal" method="post" action="adicionar.php">
<fieldset>
<legend>Adicionar Equipe</legend>
<!-- Text input-->
<div class="form-group">
   <label class="col-md-4 control-label" for="nome">Nome da Equipe</label>
      <div class="col-md-6">
        <input id="equipe" name="add-equipe" type="hidden" value="add-equipe">
        <input id="equipe" name="nome_equipe"  type="text" placeholder="equipe" class="form-control input-md" required="" value="<?php  if(isset($_POST['equipe'])) echo htmlspecialchars($_POST['equipe']); ?>" >
      </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-6">
<button id="button1id" name="button1id" class="btn btn-success">Adicionar</button>
<button id="Cancelar" name="Cancelar" class="btn btn-danger" onClick="history.go(-1)">Cancelar</button>
</div>
</div>

</fieldset>
</form>


<?php include_once 'app/view/partlals/footer.php' ?>
