<?php
require_once ('core/query.php');

$addPerguntas = '<li><a href="adicionar-pergunta.php">Adicionar Perguntas</a></li>';
$addEquipe = '<a href="adicionar-equipe.php">Adicionar Equipe</a></li>';

require_once ('view/partlals/header.php');


  function inserir($table ,$value) {
      $query = "INSERT INTO $table  VALUES (default, '{$value}')";
      return Query::insert($query);
  }

  function inserirGabarito($table, $a, $b, $c, $d, $correta) {
      $query = "INSERT INTO $table VALUES (LAST_INSERT_ID(), '{$a}', '{$b}', '{$c}', '{$d}', '{$correta}')";
      return Query::insert($query);
  }

  function inserirResposta($resposta, $equipe, $pergunta, $ponto) {
      $query = "INSERT INTO respostas VALUES ('{$resposta}', {$equipe},{$pergunta},{$ponto})";
      return Query::insert($query);
  }

  if(isset($_POST['add-equipe'])){
    $value = $_POST['nome_equipe'];

  if(inserir('equipe' ,$value)){ ?>
      <p class="alert-success">Adicionado Equipe com sucesso!</p>
    <?php } else { ?>
      <p class="alert-danger">Equipe não foi adicionado, ela ja deve existir!</p>
    <?php }
  } else if (isset($_POST['add-pergunta'])){
    $value = $_POST['pergunta'];

    if(inserir('perguntas' ,$value)){ ?>
      <p class="alert-success">Adicionou pergunta com sucesso!</p>
    <?php } else { ?>
      <p class="alert-danger">Erro ao adicionar pergunta!</p>
    <?php }

    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $correta = $_POST['correta'];

    if(inserirGabarito('gabarito', $a, $b, $c, $d, $correta)){ ?>
      <p class="alert-success">Adicionou gabarito com sucesso!</p>
    <?php } else { ?>
      <p class="alert-danger">Erro ao adicionar gabarito!</p>
    <?php }
    }


    if(isset($_GET['resposta']) && isset($_GET['equipe']) && isset($_GET['pergunta']) && isset($_GET['ponto'])){
        if(inserirResposta($_GET['resposta'], $_GET['equipe'], $_GET['pergunta'], $_GET['ponto'])){ ?>
          <p class="alert-success">Adicionou Resposta com sucesso!</p>
        <?php } else { ?>
          <p class="alert-danger">Erro ao adicionar Resposta!</p>
        <?php }
   }
