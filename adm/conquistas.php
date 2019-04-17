<?php 
require_once("global.php");
include "cabecalho.php";

$alunos = new Alunos();
$alunos->buscarTodos();

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
    <form id="form" action="conquistas_controller.php" method="POST">
      <input type="hidden" name="idAluno" id="idAluno" value="0">
      <input type="hidden" name="idCompetencia" id="idCompetencia" value="0">
    </form>
    <div class="container-fluid">
      <div class="row"> 
        <?php foreach ($alunos->lista as $aluno) : ?>
          <div class="col-sm">
           <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="../<?= $aluno->foto?>">
              </a>
            </div>
            <div class="card-body">
              <button class="btn btn-rose btn-round btn-avaliar" data-toggle="modal" data-target="#myModal" data-id="<?= $aluno->id?>" >avaliar</button>
              <h4 class="card-title"><?= $aluno->nome?></h4>
            </div>
          </div>
        </div>
      <?php endforeach ?>
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

$(".btn-avaliar").on("click", function(){
  $('#idAluno').val( $(this).attr('data-id') )
});

$(".btn-competencia").on("click", function(){
  $("#idCompetencia").val( $(this).attr('data-id') );
  $('#form').submit();
});

</script>