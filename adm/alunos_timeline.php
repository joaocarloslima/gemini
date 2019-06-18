<?php 
require_once("global.php");
include "cabecalho.php";

$idAluno = $_GET["id"];
$controle = new ControleFase();
$controle->idAluno = $idAluno;
$fases = $controle->getTimeline();
//var_dump($fases);
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
        <a class="navbar-brand" href="#">Fases Realizadas pelo Aluno</a>
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-timeline card-plain">
          <div class="card-body">
            <ul class="timeline">
              <?php 
              $cont = 0;
              foreach ($fases as $fase) : 
                $cont++;
                if($fase->tipo=="Atividade"){
                  $icone = "build";
                }else{
                  $icone = "check_circle_outline";
                }
              ?>
              <li <?= ($cont%2==0)?"class='timeline-inverted'":''?> >
                <div class="timeline-badge danger">
                  <i class="material-icons"><?= $icone ?></i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-danger"><?= $fase->missao ?></span>
                  </div>
                  <div class="timeline-body">
                    <p><strong><?= $fase->nome ?></strong></p>
                    <p><?= $fase->descricao ?></p>
                    <p><strong>XP:</strong> <?= $fase->xpObtido . "/". $fase->xp ?></p>
                    <p><strong>Feedback:</strong> <?= $fase->feedback ?></p>
                    <p><strong>Finalizado em </strong> <?= $fase->finalizadoEm ?></p>
                  </div>
                  <hr>
                  <div class="timeline-footer">
                    <div class="dropdown">
                      <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">build</i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include "rodape.php" ?>