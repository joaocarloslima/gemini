<?php 
require_once("global.php");
include "cabecalho.php";
$idFase = $_GET["id"];

$fase = new Fase();
$fase->id = $idFase;
$fase->carregar();

$questoes = Questao::listarQuestoes($idFase);

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
      <span class="navbar-text">
        <button class="btn btn-primary btn-link" id="botaoSalvar">Salvo</button>

      </span>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="missoes.php">Missões</a></li>
            <li class="breadcrumb-item"><a href="fases.php?idmissao=<?= $fase->idMissao ?>"><?= $fase->missao ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $fase->nome ?></li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1><?= $fase->nome ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ol id="containerQuestoes">
            <?php foreach ($questoes as $questao) : ?>
              <li class="item-enunciado">
                <div class="row">
                  <div class="col-md-10"> 
                    <input type="text" class="form-control enunciado" id="q<?= $questao->id ?>" value="<?= $questao->enunciado?>">
                    <ol class="containerAlternativas"> 
                      <button class="btn btn-primary btn-fab btn-fab-mini btn-round adicionarAlternativa">
                        <i class="material-icons">add</i>
                      </button>
                    </ol>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-danger btn-fab btn-fab-mini btn-round removerItem">
                      <i class="material-icons">close</i>
                    </button>
                  </div>
                </div>
              </li>
            <?php endforeach ?>
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
    //alterar texto da questão
    $("#containerQuestoes").delegate(".enunciado", "change", function(){
      $("#botaoSalvar").text("Salvando...");
      var idElemento = $(this).closest("li").find("input").attr("id"); 
      $.ajax({
        method: "POST",
        url: "questao_controller.php",
        data: { 
          idQuestao: idElemento.substring(1,), 
          enunciado: $(this).val(), 
          acao: "edit" 
        },
        success: (function(msg){
          $("#botaoSalvar").text("Salvo");
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
      $("#botaoSalvar").text("Salvando...");
      $("#containerQuestoes").append(
        '<li class="item-enunciado">' + 
        '<div class="row">' + 
        '<div class="col-md-10">' + 
        '<input type="text" class="form-control enunciado">'+
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
          idFase: <?= $idFase ?>, 
          acao: "new" 
        },
        success: (function(msg){
         $("#containerQuestoes li").last().find("input").attr("id", "q" + msg) ;
          $("#botaoSalvar").text("Salvo");
        })
      });
    });

    $("#containerQuestoes").delegate(".removerItem", "click", function(){
      $("#botaoSalvar").text("Salvando...");
      var idElemento = $(this).closest("li").find("input").attr("id"); 
      $.ajax({
        method: "POST",
        url: "questao_controller.php",
        data: { 
          idQuestao: idElemento.substring(1,), 
          acao: "del" 
        },
        success: (function(msg){
          $("#botaoSalvar").text("Salvo");
        })
      });

      $(this).closest("li").remove();
    });
    
  </script>

  <?php
  mostrarAlerta("success", "top");
  mostrarAlerta("danger", "top");
  ?>