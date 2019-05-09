<?php 
require_once("global.php");
include "cabecalho.php";

$fase = new Fase();
$fase->id = $_GET["id"];
$fase->carregar();

$atividade = new Atividade();
$atividade->idFase = $fase->id;
$atividadesNaoAvaliadas = $atividade->buscarAtividadesNaoAvaliadas();
$atividadesJaAvaliadas = $atividade->buscarAtividadesJaAvaliadas();

?>
<link rel="stylesheet" type="text/css" href="assets/css/avaliar.css">
<link rel="stylesheet" type="text/css" href="../assets/css/stars.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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
        <a class="navbar-brand" href="#">Avaliar Atividade</a>
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
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="missoes.php">Missões</a></li>
              <li class="breadcrumb-item"><a href="fases.php?idmissao=<?= $fase->idMissao ?>"><?= $fase->missao ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Avaliar Atividade: <strong><?= $fase->nome ?></strong></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="page-categories">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#link7" role="tablist">
                  <span class="badge badge-danger"><?= count($atividadesNaoAvaliadas)?></span>
                  <i class="material-icons">contact_support</i> Não Avaliados
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                  <span class="badge badge-danger"><?= count($atividadesJaAvaliadas)?></span>
                  <i class="material-icons">done</i> Já Avaliados
                </a>
              </li>
            </ul>
            <div class="tab-content tab-space tab-subcategories">
              <div class="tab-pane active show" id="link7">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Atividades não avaliadas</h4>
                    <p class="card-category">
                      <?= count($atividadesNaoAvaliadas) ?> atividade(s) pendente(s)
                    </p>
                  </div>
                  <div class="card-body">
                    <div id="accordion" role="tablist">

                      <?php foreach ($atividadesNaoAvaliadas as $atividade) : ?>
                        <?php $indice = $atividade->idAluno ?>
                        <div class="card card-collapse">
                          <div class="card-header" role="tab" id="heading<?= $atividade->idAluno ?>">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse<?= $indice?>" aria-expanded="false" aria-controls="collapse<?= $indice?>">
                                <img src="../<?= $atividade->fotoAluno?>" class="foto-aluno">
                                <?= $atividade->aluno?>
                                <i class="material-icons">keyboard_arrow_down</i>
                              </a>
                            </h5>
                          </div>
                          <div id="collapse<?= $indice?>" class="collapse" role="tabpanel" aria-labelledby="heading<?= $indice?>" data-parent="#accordion">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6"><?= $atividade->resposta ?></div>
                                <div class="col-md-6">
                                  <form action="feedback_salvar.php" method="POST">
                                    <input type="hidden" name="idFase" value="<?= $atividade->idFase?>">
                                    <input type="hidden" name="idAluno" value="<?= $atividade->idAluno?>">
                                    <div class="form-group">
                                      <label for="feedback">Feedback</label>
                                      <textarea class="form-control" id="feedback" rows="7" name="feedback"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <div class='cont'>
                                        <div class='stars'>
                                          <input class='star star-5' id='star-5-<?= $indice?>' type='radio' name='desempenho' value='1' required/>
                                          <label class='star star-5' for='star-5-<?= $indice?>'></label>
                                          <input class='star star-4' id='star-4-<?= $indice?>' type='radio' name='desempenho' value='0.8' />
                                          <label class='star star-4' for='star-4-<?= $indice?>'></label>
                                          <input class='star star-3' id='star-3-<?= $indice?>' type='radio' name='desempenho' value='0.6' />
                                          <label class='star star-3' for='star-3-<?= $indice?>'></label>
                                          <input class='star star-2' id='star-2-<?= $indice?>' type='radio' name='desempenho' value='0.4' />
                                          <label class='star star-2' for='star-2-<?= $indice?>'></label>
                                          <input class='star star-1' id='star-1-<?= $indice?>' type='radio' name='desempenho' value='0.2' />
                                          <label class='star star-1' for='star-1-<?= $indice?>'></label>
                                        </div>
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="material-icons">check</i>Salvar Feedback</button>
                                  </form>
                                </div>
                                <a href="fase_cancelar_envio.php?idFase=<?= $fase->id ?>&idAluno=<?= $atividade->idAluno ?>" class="btn btn-danger"><i class="material-icons">arrow_back</i>Cancelar envio</a>
                                <?php if ($atividade->anexo != "") : ?>
                                  <a href="../<?= $atividade->anexo ?>" target="_blank" class="btn btn-info"><i class="material-icons">attach_file</i>Anexo enviado</a>
                                <?php endif ?>
                              </div>
                            </div>
                            <div class="card-footer text-muted">finalizado em <?= $atividade->finalizadoEm ?></div>
                          </div>
                        </div>
                      <?php endforeach ?>

                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="link8">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Atividades avaliadas</h4>
                    <p class="card-category">
                      <?= count($atividadesJaAvaliadas)?> atividades já avaliadas
                    </p>
                  </div>
                  <div class="card-body">
                    <div id="accordion" role="tablist">
                      <?php foreach ($atividadesJaAvaliadas as $atividade) : ?>
                        <?php $indice = $atividade->idAluno ?>
                        <div class="card card-collapse">
                          <div class="card-header" role="tab" id="heading<?= $atividade->idAluno ?>">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse<?= $indice?>" aria-expanded="false" aria-controls="collapse<?= $indice?>">
                                <img src="../<?= $atividade->fotoAluno?>" class="foto-aluno">
                                <?= $atividade->aluno?>
                                <i class="material-icons">keyboard_arrow_down</i>
                              </a>
                            </h5>
                          </div>
                          <div id="collapse<?= $indice?>" class="collapse" role="tabpanel" aria-labelledby="heading<?= $indice?>" data-parent="#accordion">
                            <div class="card-body">
                              <div class="row">

                                <div class="col-md-4">
                                  <div class="card card-pricing">
                                    <div class="card-body ">
                                      <div class="card-icon"><i class="fas fa-hand-holding"></i></div>
                                      <h3 class="card-title">Entregue em <?= $atividade->finalizadoEm ?></h3>
                                      <p class="card-description"><?= $atividade->resposta ?></p>
                                      <?php if ($atividade->anexo != "") : ?>
                                        <a href="../<?= $atividade->anexo ?>" target="_blank" class="btn btn-info"><i class="material-icons">attach_file</i>Anexo enviado</a>
                                      <?php endif ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card card-pricing">
                                    <div class="card-body ">
                                      <div class="card-icon"><i class="fas fa-star"></i></div>
                                      <h3 class="card-title">Avaliado com <?= $atividade->xp ?> XP</h3>
                                      <p class="card-description"><?= $atividade->feedback ?></p>
                                      <form action="feedback_cancelar.php" method="POST">
                                        <input type="hidden" name="idAluno" value="<?= $atividade->idAluno?>">
                                        <input type="hidden" name="idFase" value="<?= $atividade->idFase?>">
                                        <button type="submit" class="btn btn-primary btn-round"><i class="fas fa-undo"></i> Cancelar Avaliação</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <?php if ($atividade->feedbackVisualizadoEm != "") : ?>
                                <div class="col-md-4">
                                  <div class="card card-pricing">
                                    <div class="card-body ">
                                      <div class="card-icon"><i class="fas fa-eye"></i></div>
                                      <h3 class="card-title">Visto em <?= $atividade->feedbackVisualizadoEm ?></h3>
                                      <p class="card-description">O aluno já tomou ciência da avaliação</p>
                                    </div>
                                  </div>
                                </div>
                              <?php endif ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
</div>
</div>

<?php include "rodape.php" ?>

<?php
mostrarAlerta("success", "top");
mostrarAlerta("danger", "top");
?>