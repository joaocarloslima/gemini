<?php 
require_once("global.php");
include "cabecalho.php";

$tempoDeEstudo = new TempoDeEstudo($_SESSION["iduser"]);
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
        <a class="navbar-brand" href="#pablo">Dashboard</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span class="score">74</span>
              <i class="fas fa-star"></i>
              <p class="d-lg-none d-md-block">
                XP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span class="score">4</span>
              <i class="material-icons">signal_cellular_alt</i>
              <p class="d-lg-none d-md-block">
                Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span class="score">12</span>
              <i class="fa fa-medal"></i>
              <p class="d-lg-none d-md-block">
                Medalha
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <span class="notification">3</span>
              <p class="d-lg-none d-md-block">
                avisos
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Nova missão liberada</a>
              <a class="dropdown-item" href="#">Novo feedback na tarefa 3</a>
              <a class="dropdown-item" href="#">Questionário 3 disponível</a>
            </div>
          </li>
        </ul>
      </div>
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
                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 15 pontos </span> para o próximo nível</p>
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
                  <h3 class="card-title">74</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">search</i><a href="#">Ver missões</a>
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
                  <h3 class="card-title">4</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">trending_up</i> 15 XP para nível 5
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h3>Missões Disponíveis</h3>
          <br>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="false">
                  <img class="img" src="assets/img/card-2.jpg">
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#pablo">Missão 1: Trabalho Acadêmico</a>
                  </h4>
                  <div class="card-description">
                    A divulgação de uma pesquisa é parte fundamento do seu desenvolvimento. Para isso, é importante seguir certas normas e padrões. Nessa missão você deve formatar um trabalho acadêmico seguindo as normas da ABNT.
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Pontos de Experiência">
                      <i class="fa fa-star"></i> 15
                    </button>
                  </div>
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Medalhas">
                      <i class="fa fa-medal"></i> 4
                    </button>
                  </div>
                  <div class="stats">
                    <a class="btn btn-default btn-link" rel="tooltip" data-placement="bottom"">
                      <i class="fa fa-rocket"></i> acessar 
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="false">
                  <img class="img" src="assets/img/card-3.jpg">
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#pablo">Missão 1: Trabalho Acadêmico</a>
                  </h4>
                  <div class="card-description">
                    A divulgação de uma pesquisa é parte fundamento do seu desenvolvimento. Para isso, é importante seguir certas normas e padrões. Nessa missão você deve formatar um trabalho acadêmico seguindo as normas da ABNT.
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Pontos de Experiência">
                      <i class="fa fa-star"></i> 15
                    </button>
                  </div>
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Medalhas">
                      <i class="fa fa-medal"></i> 4
                    </button>
                  </div>
                  <div class="stats">
                    <a class="btn btn-default btn-link" rel="tooltip" data-placement="bottom"">
                      <i class="fa fa-rocket"></i> acessar 
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="false">
                  <img class="img" src="assets/img/card-1.jpg">
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#pablo">Missão 1: Trabalho Acadêmico</a>
                  </h4>
                  <div class="card-description">
                    A divulgação de uma pesquisa é parte fundamento do seu desenvolvimento. Para isso, é importante seguir certas normas e padrões. Nessa missão você deve formatar um trabalho acadêmico seguindo as normas da ABNT.
                  </div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Pontos de Experiência">
                      <i class="fa fa-star"></i> 15
                    </button>
                  </div>
                  <div class="stats">
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Medalhas">
                      <i class="fa fa-medal"></i> 4
                    </button>
                  </div>
                  <div class="stats">
                    <a class="btn btn-default btn-link" rel="tooltip" data-placement="bottom"">
                      <i class="fa fa-rocket"></i> acessar 
                    </a>
                  </div>
                </div>
              </div>
            </div>
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