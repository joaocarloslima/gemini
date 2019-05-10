<?php 
include "cabecalho.php";

$missao = new Missao();
$missao->id = $_GET["id"];
$missao->carregar();
//IMPORTANTE: TO-DO VERIFICAR SE O ALUNO TEM PERMISSAO PARA ACESSAR ESSA MISSAO VIA GET

$fases = new Fase();
$fases->buscarFasesDaMissao($missao->id);

$controleFase = new ControleFase();
?>
<link rel="stylesheet" type="text/css" href="adm/assets/css/fases.css">
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
                  <img class="img" src="assets/img/professor.jpg">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="timeline timeline-simple">
            <?php foreach ($fases->listaCompleta as $fase) : ?>
              <?php $corTimeline = "primary"; ?>
              <?php
                $alunoJaFez = $fase->alunoJaFez($_SESSION["iduser"]);
                $prazo = strtotime($fase->prazo);
                $hoje = strtotime(date('Y-m-d H:i:s'));
                $prazoEsgotado = ($prazo <= $hoje);
                $professorJaCorrigiu = $fase->professorJaCorrigiu($_SESSION["iduser"]);
                //Status 0: aluno ainda não fez
                if  (!$alunoJaFez) $status = 0;
                //Status 1: aluno fez, mas professor ainda não corrigiu
                if  ($alunoJaFez && !$professorJaCorrigiu) $status=1;
                //Status 2: aluno fez e professor corrigiu
                if  ($alunoJaFez && $professorJaCorrigiu) $status=2;
              ?>
              <li class="timeline-inverted">
                <div class="timeline-badge <?= ($alunoJaFez)?'success':'pendente' ?>">
                  <i class="material-icons"><?php echo ($fase->tipo=="Atividade")?"build":"check_circle_outline"; ?></i>
                </div>
                <div class="timeline-panel <?= (!$alunoJaFez && $prazoEsgotado)?'fase-desabilitada':''; ?> ">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-<?= $corTimeline ?>"><?= $fase->tipo ?></span>
                  </div>
                  <div class="timeline-body">
                    <h3><strong><?= $fase->nome ?></strong></h4>
                    <p><?= $fase->descricao ?></p>
                    <div class="row">
                      <div class="col-md-6"><h6><i class="material-icons">star</i> <?= $fase->xp ?></h6></div>
                      <div class="col-md-6 text-right"><h6><i class="material-icons">calendar_today</i> <?= $fase->prazoFormatado ?></h6></div>
                    </div>
                    <hr>
                    <!-- Status: aluno ainda não fez-->
                    <?php 
                      if  (!$alunoJaFez){
                        if ($prazoEsgotado) {
                      ?>
                         <h6 class="text-right"><i class="ti-time"><i class="material-icons">timer_off</i>prazo esgotado</i>
                      <?php  }else{ 
                          $link = ($fase->tipo=="Atividade")?"fase_atividade.php":"fase_questionario.php"; 
                      ?>
                      <a href="<?= $link?>?id=<?= $fase->id ?>" class="btn btn-round btn-<?= $corTimeline?>">Realizar</a>
                    <?php } }?>

                    <!-- Status: aluno já fez, mas professor não corrigiu-->
                    <?php if  ($alunoJaFez && !$professorJaCorrigiu) : ?>
                      <h6 class="text-right"><i class="ti-time"><i class="material-icons">access_time</i> fase realizada, aguardando correção...</i></h6>
                    <?php endif ?>
                    
                    <!-- Status: aluno já fez, e professor já corrigiu-->
                    <?php if  ($alunoJaFez && $professorJaCorrigiu) : ?>
                    <?php $controleFase->marcarFeedbackComoLido($fase->id, $_SESSION["iduser"]) ?>
                    <h6 class="text-right"><i class="ti-time"><i class="material-icons text-warning">star</i> você ganhou <?= $fase->xpObtido ?> XP.</i>
                      <?php if ($fase->tipo == "Atividade"): ?>
                        <button class="btn btn-round btn-success btn-fab btn-fab-mini" data-toggle="tooltip" data-placement="top" title="<?= $fase->feedback ?>">
                          <i class="material-icons">comment</i>
                        </button>
                        <?php if ($fase->anexoEnviado != ""): ?>
                          <a href="<?= $fase->anexoEnviado ?>" target="_blank" class="btn btn-round btn-info btn-fab btn-fab-mini" data-toggle="tooltip" data-placement="bottom" title="ver atividade entregue">
                          <i class="material-icons text-white">attach_file</i>
                          </a>
                        <?php endif ?>
                      <?php elseif ($prazoEsgotado) : ?>
                        <a href="fase_questionario_correcao.php?id=<?= $fase->id?>" class="btn btn-round btn-success btn-fab btn-fab-mini" data-toggle="tooltip" data-placement="top" title="ver correção">
                          <i class="material-icons text-white">rate_review</i>
                        </a>
                      <?php endif ?>
                    </h6>
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