<?php
require_once ('conexao.php');

class Query Extends ConexaoDB {

  public function __construct() {
  }

  public function insert($query) {
    try{
      $validar = Parent::getInstanceConexao()->prepare($query);
      $validar->execute();
      return true;
    } catch(Exception $ex) {
      echo "erro $ex";
      return false;
    }

  }

  public function selection($id) {
    try{
        $query = "SELECT * FROM perguntas JOIN gabarito ON perguntas.id_pergunta =  gabarito.id_gabarito WHERE id_pergunta = {$id}";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        } else {
          echo "Pergunta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      echo "EXCEÇÃO NA CONSULTA DE PERGUNTAS!";
      return false;
    }
  }

public function selectionPontoEquipe() {
  try{
      $query =  "SELECT count(ponto) as pontos, nome_equipe FROM respostas JOIN equipe ON respostas.equipe_id_equipe = equipe.id_equipe WHERE respostas.ponto > 0 group by nome_equipe";
      $validar = Parent::getInstanceConexao()->prepare($query);
      $validar->execute();

      return $validar->fetchAll(PDO::FETCH_ASSOC);

  } catch (Exception $pJ){
    echo "EXCEÇÃO NA CONSULTA DE Equipes!";
    return false;
  }
}

  public function selectionEquipe() {
    try{
        $query = "SELECT * FROM equipe";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $pJ){
      echo "EXCEÇÃO NA CONSULTA DE Equipes!";
      return false;
    }
  }

  public function selectionResposta($coluna, $id) {
    try{
        $query = "SELECT {$coluna} FROM gabarito WHERE correta = '{$coluna}' and id_gabarito = {$id}";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        } else {
          echo "Resposta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      echo "EXCEÇÃO NA CONSULTA DA RESPOSTA CORRETA!";
      return false;
    }
  }
}
