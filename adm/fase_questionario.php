<?php 
require_once("global.php");
include "cabecalho.php";
$idFase = $_GET["id"];

?>
<link rel="stylesheet" type="text/css" href="assets/css/questionario.css">
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
          </button>
        </div>
        <a class="navbar-brand" href="#">Montar Questionário</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Nome do Questionário</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ol id="containerQuestoes">
            <li class="item-enunciado">
              <div class="row">
                <div class="col-md-10">
                  <input type="text" class="form-control enunciado" id="q1">
                  <ol class="containerAlternativas">
                    <button class="btn btn-primary btn-fab btn-fab-mini btn-round adicionarAlternativa">
                      <i class="material-icons">add</i>
                    </button>
                  </ol>
                </div>
              </div>
            </li>
          </ol>
        </div>
        <div class="col-md-12" id="containerBotoes">
          <button class="btn btn-info btn-fab btn-fab-mini btn-round" id="adicionarQuestao">
            <i class="material-icons">add</i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <?php include "rodape.php" ?>

  <script type="text/javascript">
    var ultimoId = 2;

    //alterar texto da questão
    $("#containerQuestoes").delegate(".enunciado", "change", function(){
      $.ajax({
        method: "POST",
        url: "questao_controller.php",
        data: { 
          idElemento: $(this).closest("li").find("input").attr("id"),
          idFase: <?= $idFase ?>, 
          enunciado: $(this).val(), 
          acao: "edit" 
        },
        success: (function(msg){
          console.log(msg);
        })
      });
      
    });

    $("#containerQuestoes").delegate(".adicionarAlternativa", "click", function(){
      $(this).closest(".adicionarAlternativa").before(
        '<li class="item-alternativa">' + 
        '<div class="row">' + 
        '<div class="col-md-10">' + 
        '<input type="text" class="form-control campo-alternativa">' + 
        '</div>' +
        '<div class="col-md-2">' + 
        '<button class="btn btn-danger btn-fab btn-fab-mini btn-round removerItem">' + 
        '<i class="material-icons">close</i>' + 
        '</button>' +  
        '</div>' +
        '</div>' +
        '</li>'
        );   
    });

    //adicionar uma nova questão
    $("#adicionarQuestao").click(function(){
      $("#containerQuestoes").append(
        '<li class="item-enunciado">' + 
        '<div class="row">' + 
        '<div class="col-md-10">' + 
        '<input type="text" class="form-control enunciado" id="q'+ ultimoId + '">'+
        '<ol class="containerAlternativas">' + 
        '<button class="btn btn-primary btn-fab btn-fab-mini btn-round adicionarAlternativa">' + 
        '<i class="material-icons">add</i>' + 
        '</button>' + 
        '</ol>' + 
        '</div>' +
        '<div class="col-md-2">' + 
        '<button class="btn btn-danger btn-fab btn-fab-mini btn-round removerItem">' + 
        '<i class="material-icons">close</i>' + 
        '</button>' +  
        '</div>' +
        '</div>' +
        '</li>'
        );
        $.ajax({
          method: "POST",
          url: "questao_controller.php",
          data: { 
            idElemento: "q" + ultimoId,
            idFase: <?= $idFase ?>, 
            acao: "new" 
          },
          success: (function(msg){
            console.log(msg);
          })
        });
        ultimoId++;
   
    });

    $("#containerQuestoes").delegate(".removerItem", "click", function(){
      $.ajax({
        method: "POST",
        url: "questao_controller.php",
        data: { 
          idElemento: $(this).closest("li").find("input").attr("id"),  
          idFase: <?= $idFase ?>, 
          enunciado:$(this).closest("li").find("input").val(), 
          acao: "del" 
        },
        success: (function(msg){
          console.log(msg);
        })
      });

      $(this).closest("li").remove();
    });
    
  </script>

  <?php
  mostrarAlerta("success", "top");
  mostrarAlerta("danger", "top");
  ?>