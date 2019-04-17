<?php 

include "cabecalho.php" ;

$conquista = new Conquista();
$conquista->idAluno = $_SESSION["iduser"];
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
      <?php include "barra_status.php"; ?>

    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="content">
      <div class="container-fluid">
        <div class="header text-center">
          <p class="category">Nessa página você consegue visualizar a avaliação qualitativa do professor. Conforme você demonstra uma compentência na sala de aula,  o professor atribui uma conquista para o seu inventário. Acumular conquista faz você evoluir na disciplina.
          </p>
        </div>


        <?php foreach ($conquistas as $c) : ?>
          <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
              <div class="card-body">
                <h4 class="card-category"><?= $c->nome ?></h4>
                <div class="card-icon icon-<?= $c->cor ?>">
                  <i class="material-icons"><?= $c->imagem ?></i>
                </div>
                <h3 class="card-title">
                  <i class="fas fa-star <?= ($c->obtidas >= ($c->totalDePassos/3)*1)?'text-warning':'' ?>"></i>
                  <i class="fas fa-star <?= ($c->obtidas >= ($c->totalDePassos/3)*2)?'text-warning':'' ?>"></i>
                  <i class="fas fa-star <?= ($c->obtidas >= ($c->totalDePassos/3)*3)?'text-warning':'' ?>"></i>
                </h3>
                <p class="card-description"><?= utf8_encode($c->descricao) ?></p>
                <p class="card-description"><?= $c->obtidas . "/" . $c->totalDePassos ?></p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($c->obtidas/($c->totalDePassos/3)*100)%100 ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>


    </div>

  </div>
</div>
</div>

<?php include "rodape.php" ?>