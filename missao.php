<?php 
include "cabecalho.php";

$missao = new Missao();
$missao->id = $_GET["id"];
$missao->carregar();
//IMPORTANTE: TO-DO VERIFICAR SE O ALUNO TEM PERMISSAO PARA ACESSAR ESSA MISSAO VIA GET

$fases = new Fase();
$fases->buscarFasesDaMissao($missao->id);

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
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="missoes.php">Missões</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $missao->nome ?></li>
          </ol>
        </nav>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-testimonial">
            <div class="icon">
              <i class="material-icons">format_quote</i>
            </div>
            <div class="card-body">
              <h5 class="card-description"><?= $missao->descricao ?></h5>
            </div>
            <div class="card-footer">
              <h4 class="card-title">João Carlos Lima</h4>
              <div class="card-avatar">
                <a>
                  <img class="img" src="assets/img/faces/card-profile1-square.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="timeline timeline-simple">
            <?php foreach ($fases->listaCompleta as $fase) : ?>
              <?php $corTimeline = ($fase->tipo=="Atividade")?"info":"danger"; ?>
              <li class="timeline-inverted">
                <div class="timeline-badge <?= $corTimeline ?>">
                  <i class="material-icons"><?php echo ($fase->tipo=="Atividade")?"build":"help"; ?></i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-<?= $corTimeline ?>"><?= $fase->nome ?></span>
                  </div>
                  <div class="timeline-body">
                    <p><?= $fase->descricao ?></p>
                    <div class="row">
                      <div class="col-md-6"><h6><i class="material-icons">star</i> <?= $fase->xp ?></h6></div>
                      <div class="col-md-6 text-right"><h6><i class="material-icons">calendar_today</i> <?= $fase->prazoFormatado ?></h6></div>
                    </div>
                    <hr>
                    <!-- Status: aluno ainda não fez-->
                    <?php if  (!$fase->alunoJaFez($_SESSION["iduser"])) : ?>
                      <a href="fase_atividade.php?id=<?= $fase->id ?>" class="btn btn-round btn-<?= $corTimeline?>">Realizar</a>
                    <?php endif ?>

                    <!-- Status: aluno já fez, mas professor não corrigiu-->
                    <?php if  ($fase->alunoJaFez($_SESSION["iduser"]) && !$fase->professorJaCorrigiu($_SESSION["iduser"])) : ?>
                      <a class="btn btn-round disabled btn-default" aria-disabled="true">Já Realizado</a>
                    <?php endif ?>
                    
                    <!-- Status: aluno já fez, e professor já corrigiu-->
                    <?php if  ($fase->alunoJaFez($_SESSION["iduser"]) && $fase->professorJaCorrigiu($_SESSION["iduser"])) : ?>
                      <a class="btn btn-round btn-success text-white" data-toggle="tooltip" data-placement="right" title="<?= $fase->feedback ?>">
                        Você ganhou <?= $fase->xpObtido ?>
                        <i class="material-icons">star</i>
                      </a>
                    <?php endif ?>

                    </div>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
          
       </div>
      </div>

      <?php include "rodape.php" ?>

      <?php 
      mostrarAlerta("danger", "top");
      mostrarAlerta("success", "top");
      ?>