<?php 
require_once("global.php");
include "cabecalho.php";

$alunos = new Alunos();

$conquista = new Conquista();
$conquistas = $conquista->buscarTodas();


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
        <a class="navbar-brand" href="#">Conquistas</a>
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
        <div class="card card-nav-tabs card-plain">
          <div class="card-header card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#1DA" data-toggle="tab">1D - A</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#1DB" data-toggle="tab">1D - B</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#1CA" data-toggle="tab">1C - A</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#1CB" data-toggle="tab">1C - B</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <br>
          <div class="card-body ">
            <div class="tab-content text-center">
              <div class="tab-pane active" id="1DA">
                <div class="row">
                  <?php  
                  $alunos->buscarTodos(0, 1);
                  echo cards($alunos->lista);
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="1DB">
                <div class="row">
                  <?php  
                  $alunos->buscarTodos(0, 2);
                  echo cards($alunos->lista);
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="1CA">
                <div class="row">
                  <?php  
                  $alunos->buscarTodos(0, 3);
                  echo cards($alunos->lista);
                  ?>
                </div>
              </div>
              <div class="tab-pane" id="1CB">
                <div class="row">
                  <?php  
                  $alunos->buscarTodos(0, 4);
                  echo cards($alunos->lista);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--modal avaliar -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Competência Evidenciada</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <?php foreach ($conquistas as $c) : ?>
              <div class="col-lg-6">
                <button class="btn btn-<?= $c->cor ?> btn-lg btn-competencia" style="margin-bottom:4px;white-space: normal;" data-id="<?= $c->id ?>">
                  <i class="material-icons" ><?= $c->imagem?></i>
                  <?= utf8_encode($c->descricao) ?>
                </button>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "rodape.php" ?>

  <?php 
  mostrarAlerta("danger", "top");
  mostrarAlerta("success", "top");
  ?>

  <script type="text/javascript">
    var idAlunoAvaliado = 0;

    $(".btn-avaliar").on("click", function(){
      idAlunoAvaliado = $(this).attr('data-id');
    });

    $(".btn-competencia").on("click", function(){
      let idConquista = $(this).attr('data-id');
      $.ajax({
        method: "POST",
        url: "conquistas_controller.php",
        data: {idCompetencia : idConquista, idAluno: idAlunoAvaliado}
      })
      .done(function(msg) {
        if (msg === "ok"){
          gemini.showNotification('Competência registrada', 'success', 'top', 'center', 'notifications');
        }else{
          gemini.showNotification('Erro ao registrar competência', 'danger', 'top', 'center', 'error');
      }
      });
    });

  </script>

  <?php 
  function cards($listaDeAluno){
    $cards = "";
    $conquista = new Conquista();

    foreach ($listaDeAluno as $aluno) {
      $cards .= "<div class='col-md-4'>";
      $cards .= "<div class='card card-profile'>";
      $cards .= "<div class='card-avatar'>";
      $cards .= "<a href='#'>";
      $cards .= "<img class='img' src='../" . $aluno->foto . "'>";
      $cards .= "</a>";
      $cards .= "</div>";
      $cards .= "<div class='card-body'>";
      $cards .= "<a data-toggle='collapse' href='#collapse" . $aluno->id. "' aria-expanded='false' aria-controls='collapse" . $aluno->id . "'>";
      $cards .= "<h4 class='card-title'><strong>". $aluno->nome . "</strong></h4>";
      $cards .= "</a>";
      $cards .= "<div class='collapse' id='collapse". $aluno->id ."'>";

      $conquista->idAluno = $aluno->id;
      $conquistas = $conquista->buscarTodas();

      foreach ($conquistas as $c) {
        $cards .= "<div class='progress-container'>";
        $cards .= "<span class='progress-badge'>". utf8_encode($c->descricao) ."</span>";
        $cards .= "<div class='progress'>";
        $cards .= "<div class='progress-bar progress-bar-" . $c->cor . "' role='progressbar' aria-valuenow=" . $c->obtidas . " aria-valuemin='0' aria-valuemax='100' style='width: ". ($c->obtidas/($c->totalDePassos)*100) . "%'>";
        $cards .= "</div>";
        $cards .= "</div>";
        $cards .= "</div>";
      }

      $cards .= "</div>";
      $cards .= "<button class='btn btn-rose btn-round btn-avaliar' data-toggle='modal' data-target='#myModal' data-id=" .$aluno->id . " >avaliar</button>";
      $cards .= "</div>";
      $cards .= "</div>";
      $cards .= "</div>";
    }
    return $cards;
  }

  ?>