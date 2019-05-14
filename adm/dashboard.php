<?php 
require_once("global.php");
include "cabecalho.php";

$logs = Log::getUltimosLogs(10);

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
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-text card-header-warning">
              <div class="card-text">
                <h4 class="card-title">Log de Atividades</h4>
                <p class="card-category">Últimas ações realizadas pelos alunos no sistema</p>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <tr><th></th>
                    <th>Aluno</th>
                    <th>Data</th>
                    <th>Ação</th>
                  </tr></thead>
                  <tbody>
                    <?php foreach ($logs as $log) : ?>
                      <tr>
                        <td><img class="photo" src="../<?= $log->foto ?>" /></td>
                        <td><?= $log->nomeAluno ?></td>
                        <td><?= $log->data ?></td>
                        <td><?= $log->acao ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-rose">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Ranking:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="nav-item">
                        <a class="nav-link active" href="#1DA" data-toggle="tab">1D -A<div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#1DB" data-toggle="tab">1D - B<div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#1CA" data-toggle="tab">1C - A<div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#1CB" data-toggle="tab">1C - B<div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="1DA">
                   <?php echo tabelaRanking(1); ?>
                  </div>
                  <div class="tab-pane" id="1DB">
                   <?php echo tabelaRanking(2); ?>
                  </div>
                  <div class="tab-pane" id="1CA">
                   <?php echo tabelaRanking(3); ?>
                  </div>
                  <div class="tab-pane" id="1CB">
                   <?php echo tabelaRanking(4); ?>
                  </div>

                </div>
              </div>
            </div>              
          </div>
        </div>
      </div>
    </div>

    <?php include "rodape.php" ?>

<?php 
function tabelaRanking($idTurma){
  $alunos = new Alunos();
  $tabela = "";
  $tabela .= "<table class='table table-striped table-hover'>";
  $tabela .= "<thead class='text-primary'><tr><th>#</th><th></th><th>Nome</th><th>XP</th><th>Level</th></tr></thead>";
  $tabela .= "<tbody>";

  $alunos->buscarTodos(1, $idTurma);
  $posicao = 1;
  foreach ($alunos->lista as $aluno) {
    $tabela .= "<tr>";
    $tabela .= "<td>" . $posicao++ . "</td>";
    $tabela .= "<td><div class='photo'><img src='../$aluno->foto'/></div></td>";
    $tabela .= "<td>$aluno->nome</td>";
    $tabela .= "<td>$aluno->xp</td>";
    $tabela .= "<td>$aluno->nivel</td>";
    $tabela .= "</tr>";
  }
  $tabela .= "</tbody>";
  $tabela .= "</table>";
  return $tabela;
}

?>

