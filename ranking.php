<?php 
include "cabecalho.php";
$alunos = new Alunos();
$alunos->buscarTodos(1);

$ranking = new Ranking($_SESSION["iduser"]);

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
        <a class="navbar-brand" href="#">Ranking</a>
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
          <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                  <i class="material-icons">signal_cellular_alt</i>
                </div>
                <h4 class="card-title">Ranking</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead class=" text-primary">
                      <tr>
                        <th>#</th>
                        <th></th>
                        <th>Nome</th>
                        <th>XP</th>
                        <th>Level</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $posicao = 1;
                      foreach ($alunos->lista as $aluno) :  ?>
                        <tr <?= ($aluno->id==$_SESSION['iduser'])?"class='table-info'":"" ?>>
                          <td><?= $posicao++ ?></td>
                          <td><div class="photo"><img src="<?= $aluno->foto ?>" /></div></td>
                          <td><?= $aluno->nome ?></td>
                          <td><?= $aluno->xp ?></td>
                          <td><?= $aluno->nivel ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header card-header-info" data-header-animation="false">
                <div class="ct-chart" id="graficoRanking"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Posição no Ranking</h4>
                <p class="card-category">Últimos 15 dias</p>
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
    dias = {
      labels: <?= $ranking->getDias() ?>,
      series: [
      <?= $ranking->getPosicoes() ?>
      ]
    };

    posicoes = {
      lineSmooth: Chartist.Interpolation.cardinal({
        tension: 0
      }),
      high: 0,
        low: <?= $ranking->getMaior()*-1.1 ?>, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        axisY: {
          showLabel: false,
          offset: 10,
          labelInterpolationFnc: function(value) {
            return -value;
          }
        },
      }

      var grafico = new Chartist.Line('#graficoRanking', dias, posicoes).on('data', function(context) {
        context.data.series = context.data.series.map(function(series) {
          return series.map(function(value) {
            return -value;
          });
        });
      });
      // start animation for the Completed Tasks Chart - Line Chart
      md.startAnimationForLineChart(grafico);

    });

  </script>