<?php 
include "cabecalho.php";

$aviso = new Aviso();
$avisos = $aviso->buscarAvisosDoAluno($_SESSION["iduser"], $_SESSION["idTurma"]);

?>
<link rel="stylesheet" type="text/css" href="adm/assets/css/missoes.css">
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
        <a class="navbar-brand" href="#pablo">Avisos</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <?php include "barra_status.php"; ?>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <?php foreach ($avisos as $aviso) : ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-text">
              <h4 class="card-title"><?= $aviso->titulo ?></h4>
            </div>
          </div>
          <div class="card-body"><?= $aviso->texto ?></div>
          <hr>
          <div class="card-footer">
            <div class="stats">
                <i class="material-icons">access_time</i> postado em <?= $aviso->data?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>

    <?php include "rodape.php" ?>