<?php 
require_once("global.php");
include "cabecalho.php";

?>
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
        <div class="col-md-12" id="containerQuestoes">
          <input type="text" class="form-control" id="enunciado" placeholder="enunciado da questão" >
          <ol id="containerAlternativas">
          <button class="adicionarAlternativa">+ alternativa</button>
          </ol>
        </div>
        <div class="col-md-12" id="containerBotoes">
          <button id="adicionarQuestao">+ questão</button>
        </div>
      </div>
    </div>
  </div>

  <?php include "rodape.php" ?>

  <script type="text/javascript">
    $(".adicionarAlternativa").click(function(){
      $(this).closest("#containerAlternativas").append('<li><input type="text" class="form-control" id="alternativa" placeholder="alternativa" ></li>');   
    });

    $("#adicionarQuestao").click(function(){
      $("#containerQuestoes").append('<input type="text" class="form-control" id="enunciado" placeholder="enunciado da questão" ><ol id="containerAlternativas"></ol><button id="adicionarAlternativa">+ alternativa</button>');   
    });

    var campo = $('#enunciado');
    $("#enunciado").change(function(){
      var texto = this.value;
      $(this).replaceWith(function(){
        return $('<h2/>', {
          'id': 'enunciado',
          text: '1. ' + texto
        })
      });
    });


    
  </script>

  <?php
  mostrarAlerta("success", "top");
  mostrarAlerta("danger", "top");
  ?>