<?php 
include "cabecalho.php";
$alunos = new Alunos();
$alunos->buscarTodos(1);
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
        <a class="navbar-brand" href="#pablo">Ranking</a>
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
          <div class="col-md-8">
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
      </div>
    </div>
  </div>
  <?php include "rodape.php" ?>