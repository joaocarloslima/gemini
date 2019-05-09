<?php 
include "cabecalho.php";

$missao = new Missao();
$missoes = $missao->buscarMissoesDoAluno($_SESSION["iduser"]);

$aluno = new AlunoPlayer();
$aluno->id = $_SESSION["iduser"];
$aluno->carregar();
$level = $aluno->nivel;
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
        <a class="navbar-brand" href="#pablo">Missões</a>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php 
          foreach($missoes as $missao) :
           ?>            
           <div class="col-md-4">
            <div class="card card-product <?= ($missao->levelminimo>$level)?'card-desabilitado':''?>">
              <div class="card-header card-header-image" data-header-animation="false">
                <img class="img" src="adm/<?= $missao->imagem ?>">
              </div>
              <div class="card-body">
                <h4 class="card-title"><a href="<?= ($missao->levelminimo<=$level)?'missao.php?id='.$missao->id:'#' ?>">Missão: <?= $missao->nome ?></a></h4>
                <div class="card-description">
                  <?php 
                  if ($missao->levelminimo>$level) :
                    echo "<h3>Disponível no <strong>Nível $missao->levelminimo</strong></h3>.";
                  else:
                  ?>

                  <?= $missao->descricao ?>
                   
                  <div class="progress-container">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?= $missao->percentualConcluido ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $missao->percentualConcluido ?>%;">
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                </div>

              </div>
              <div class="card-footer">
                <?php if ($missao->levelminimo>$level) : ?>
                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Missão indisponível">
                    <i class="fa fa-lock"></i>
                  </button>
                  <?php else : ?>
                    <div class="">
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Pontos de Experiência">
                        <i class="fa fa-star"></i> <?= $missao->xp ?>
                      </button>
                    </div>
                    <div class="stats">
                      <a href="missao.php?id=<?= $missao->id ?>" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Acessar a missão">
                        <i class="fa fa-rocket"></i> acessar 
                      </a>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>
    </div>
  </div>

  <?php include "rodape.php" ?>

  <?php 
  mostrarAlerta("danger", "top");
  mostrarAlerta("success", "top");
  ?>