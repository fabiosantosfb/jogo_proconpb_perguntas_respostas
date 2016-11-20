var equipe;
var id;
var ponto;

function selectionEquipe(id_equipe){
  equipe = id_equipe;

 }
function selectionQuestion(_id) {
   id = _id;
    if(equipe != null){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
         document.getElementById("form-question").innerHTML = xhttp.responseText;
      };

       xhttp.open("GET", "question.php?id="+_id+"&equipe="+equipe, true);
       xhttp.send(null);
       equipe = null;
       return xhttp;
    } else {
      alert("Escolha a Equipe para Responder!");
    }
}

function respostaQuestion(opcao, id_equipe, id_pergunta, ponto) {

  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "adicionar.php?resposta="+opcao+"&equipe="+id_equipe+"&pergunta="+id_pergunta+"&ponto="+ponto, true);
  xhttp.send(null);
  return xhttp;

}

function respostaCorreta(frase, correto, id_equipe, id_pergunta) {
  var opcao = null;
  if(document.resposta.search[0].checked != false) {
    opcao = document.getElementById("a").value;
  } else if(document.resposta.search[1].checked != false) {
    opcao = document.getElementById("b").value;
  } else if(document.resposta.search[2].checked != false) {
    opcao = document.getElementById("c").value;
  } else if(document.resposta.search[3].checked != false) {
    opcao = document.getElementById("d").value;
  } else {
    alert("Escolha uma opção!");
  }

  if(opcao.toString()==correto.toString()){
    alert("Parabéns você acertou a opção correta:\n\n"+frase);
    if(respostaQuestion(opcao, id_equipe, id_pergunta, 1))
      retornarQuestion();
      pontoEquipe();
  } else {
    alert("Infelizmente você errou, a opção correta é:\n\n"+frase);
    if(respostaQuestion(opcao, id_equipe, id_pergunta, 0))
      retornarQuestion();
      pontoEquipe();
  }
}

function pontoEquipe() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
     document.getElementById("pontos").innerHTML = xhttp.responseText;
  };

   xhttp.open("GET", "placar.php", true);
   xhttp.send(null);
   equipe = null;
   return xhttp;
}

function retornarQuestion() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
     document.getElementById("form-question").innerHTML = "";
  };

   xhttp.open("GET", "/", true);
   xhttp.send(null);
   equipe = null;
   return xhttp;
}

function retornarPlacar() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
     document.getElementById("pontos").innerHTML = "";
  };

   xhttp.open("GET", "/", true);
   xhttp.send(null);
   equipe = null;
   return xhttp;
}

function confirma() {

  if(request.readyState == 4){
    var response = request.responseText;
    var divmain = document.getElementById("geral");
    var formid = document.getElementById("frm");
    var pelement = document.createElement("p");
    var text = document.createTextNode("Parabéns " + response + ", Cadastro Concluido!");
    pelement.appendChild(text);
    divmain.replaceNode(pelement,frm);

    var ael = document.createElement("a");
    var pula = document.createElement("<br>");
    var textlink = document.createTextNode("voltar");

    ael.appendChild(textlink);
    ael.setAttribute("href","Cadastro.html");
    pelement.appendChild(pula);
    pelement.appendChild(ael);
   }
}
