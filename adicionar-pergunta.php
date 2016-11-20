<?php $addPerguntas = ''; ?>
<?php $addEquipe = '<a href="adicionar-equipe.php">Adicionar Equipe</a></li>';?>

<?php require_once ('view/partlals/header.php') ?>

<form class="form-horizontal" method="post" action="adicionar.php">
  <input id="equipe" name="add-pergunta" type="hidden" value="add-pergunta">
<fieldset>
<legend>Adicionar Pergunta</legend>
<!-- Text input-->
<div class="form-group">
   <label class="col-md-6 control-label" for="nome"></label>
      <div class="col-md-12">
        <input id="pergunta" name="pergunta"  type="text" placeholder="Pergunta" class="form-control input-md" required="" value="<?php  if(isset($_POST['pergunta'])) echo htmlspecialchars($_POST['pergunta']); ?>" >
      </div>
</div>
<!-- Text input-->
<legend>Adicionar Responsta</legend>
<div class="form-group">
<label class="col-md-4 control-label" for="resposta"></label>
<div class="col-md-7">
  <input id="a" name="a" type="text" placeholder="Resposta A" class="form-control input-md" value="<?php  if(isset($_POST['a'])) echo htmlspecialchars($_POST['a']); ?>">
</div>
  <input name="correta" type="radio" value="a">Correta
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-7">
  <input id="b" name="b" type="text" placeholder="Resposta B" class="form-control input-md" value="<?php  if(isset($_POST['b'])) echo htmlspecialchars($_POST['b']); ?>">
</div>
<input name="correta" type="radio" value="b">Correta
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-7">
  <input id="c" name="c" type="text" placeholder="Resposta C" class="form-control input-md" value="<?php  if(isset($_POST['c'])) echo htmlspecialchars($_POST['c']); ?>">
</div>
<input name="correta" type="radio" value="c">Correta
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-7">
  <input id="d" name="d" type="text" placeholder="Resposta D" class="form-control input-md" value="<?php  if(isset($_POST['d'])) echo htmlspecialchars($_POST['d']); ?>">
</div>
<input name="correta" type="radio" value="d">Correta
</div>
<legend>Enviar Resposta</legend>
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
