<?php 
include "cabecalho.php";

$tempoDeEstudo = new TempoDeEstudo($_SESSION["iduser"]);
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
        <a class="navbar-brand" href="#pablo">Dashboard</a>
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
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-rose" data-header-animation="false">
                <div class="ct-chart" id="graficoTempoDeEstudo"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Tempo de Estudo</h4>
                <p class="card-category">Últimos 7 dias</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-success" data-header-animation="false">
                <div class="ct-chart" id="dailySalesChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Pontos de Experiência</h4>
                <p class="card-category">
                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> <?= $aluno->faltaParaProximoNivel?> pontos </span> para o próximo nível</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-info" data-header-animation="false">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Posição no Ranking</h4>
                  <p class="card-category">Últimos 30 dias</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <p class="card-category">Pontos de Exp.</p>
                  <h3 class="card-title"><?= $aluno->xp; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">search</i><a href="missoes.php">Ver missões</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                  </div>
                  <p class="card-category">Ranking</p>
                  <h3 class="card-title">16<sup>o</sup></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-success">arrow_upward</i> subiu duas possições na semana
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-medal"></i>
                  </div>
                  <p class="card-category">Medalhas</p>
                  <h3 class="card-title">12</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">beenhere</i>
                    <a href="">ver conquistas</a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">signal_cellular_alt</i>
                  </div>
                  <p class="card-category">Nível</p>
                  <h3 class="card-title"><?= $aluno->nivel ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">trending_up</i> <?= $aluno->faltaParaProximoNivel?> XP para nível <?= $aluno->nivel + 1?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h3>Missões Disponíveis</h3>
          <br>
          <div class="row">
            <?php 
            $n_cards = (count($missoes)>3)?3:count($missoes);
            for($i=0;$i<$n_cards;$i++) :
             $missao = $missoes[$i];
             ?>            
             <div class="col-md-4">
              <div class="card card-product <?= ($missao->levelminimo>$level)?'card-desabilitado':''?>">
                <div class="card-header card-header-image" data-header-animation="false">
                  <img class="img" src="adm/<?= $missao->imagem ?>">
                </div>
                <div class="card-body">
                  <h4 class="card-title"><a href="#pablo">Missão: <?= $missao->nome ?></a></h4>
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
            <?php endfor ?>

          </div>
          <div class="row">
            <a href="missoes.php" class="btn btn-rose">Ver todas as missões</a>
          </div>
        </div>
      </div>
    </div>

    <?php include "rodape.php" ?>

    <script type="text/javascript">
      $( document ).ready(function() {
        dataDailySalesChart = {
          labels: <?= $tempoDeEstudo->getDias() ?>,
          series: [
          <?= $tempoDeEstudo->getTempos() ?>
          ]
        };

        optionsDailySalesChart = {
          lineSmooth: Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: <?= $tempoDeEstudo->getMaior() + 10 ?>, 
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          },
        }

        var animationHeaderChart = new Chartist.Bar('#graficoTempoDeEstudo', dataDailySalesChart, optionsDailySalesChart);
        md.startAnimationForBarChart(animationHeaderChart);

      });
    </script>