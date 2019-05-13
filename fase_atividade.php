<?php 
include "cabecalho.php";

$fase = new Fase();
$fase->id = $_GET["id"];
$fase->carregar();

$controleFase = new ControleFase();
$controleFase->idAluno = $_SESSION["iduser"];
$controleFase->idFase = $fase->id;
$controleFase->iniciar();


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
            <li class="breadcrumb-item"><a href="missao.php?id=<?= $fase->idMissao ?>"><?= $fase->missao ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $fase->nome ?></li>
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
        <?php if (!$fase->alunoTemPermissao($_SESSION["iduser"])) :?>
          <div class="alert alert-warning" role="alert">
            Você não tem permissão para acessar essa fase no momento.
          </div>
        <?php exit; endif ?>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title"><strong>FASE:</strong> <?= $fase->nome ?></h4>
              <p class="category"><i class="material-icons">star</i> Conquiste até <?= $fase->xp ?> pontos de experência realizando essa fase</p>
            </div>
            <div class="card-body">
              <p><?= $fase->descricao ?></p>
              <?php if ($fase->anexo) : ?>
                <a href="adm/<?php echo $fase->anexo ?>" target="blank" class="btn btn-info">
                  <i class="material-icons">insert_drive_file</i> Arquivo
                </a>
              <?php endif ?>
              <form action="fase_atividade_salvar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idFase" value="<?= $fase->id ?>">
                <div class="form-group">
                  <label for="resposta">Resposta da Atividade</label>
                  <textarea class="form-control" id="resposta" rows="10" name="resposta"></textarea>
                </div>
                <div class="input-group">
                  <label for="anexo">Anexo</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">attach_file</i>
                    </span>
                  </div>
                  <input type="file" class="form-file-upload form-file-simple" id="anexo" name="anexo">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "rodape.php" ?>