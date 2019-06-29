<?php 
require_once("global.php");
include "cabecalho.php";

$aviso = new Aviso();
$avisos = $aviso->buscarTodos();

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
        <a class="navbar-brand" href="#">Avisos</a>
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
        <div class="card">
          <div class="card-header card-header-text card-header-rose">
            <div class="card-text">
              <i class="fas fa-bell"></i>
              <h4 class="card-title">Cadastro de Avisos</h4>
              <p class="card-category">Adicione avisos para os alunos ou para uma turma</p>
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar text-right">
              <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus left"></i> disparar aviso</button>
            </div>
            <div class="material-datatables">
              <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th class="text-center">Data</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($avisos as $aviso) : ?>
                    <tr>
                      <td><?= $aviso->id?></td>
                      <td><?= $aviso->titulo ?></td>
                      <td><?= (strlen($aviso->texto)>30)?substr($aviso->texto,0,30)."...":$aviso->texto ?></td>
                      <td class="text-center"><?= $aviso->data ?></td>
                      <td class="text-right">
                        <button class="btn btn-link btn-danger btn-just-icon" data-toggle="modal" data-target="#modalexcluir" onclick="trocarId(<?= $aviso->id?>)">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
</div>
</div>


<!--MODAL NOVO -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Novo Aviso</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="aviso_inserir.php" class="form-horizontal" id="form">
          <div class="row">
            <div class="col-md-4">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="1"  name="paraTurma" id="paraTurma">
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                  Turma toda
                </label>
              </div>
            </div>
            <div class="col-md-8" id="campo_destinatario">
              <div class="form-group bmd-form-group">
                <label for="texto" class="bmd-label-floating">Destinatário</label>
                <input type="text" class="form-control" id="destinatario" name="destinatario">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="nome" class="bmd-label-floating">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="texto" class="bmd-label-floating">Texto</label>
                <textarea class="form-control" id="texto" name="texto" rows="10"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-info">salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EXCLUIR -->
<div class="modal fade modal-mini modal-primary" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Confirma a exclusão do aviso? </p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Deixa pra lá</button>
        <form action="aviso_excluir.php" method="POST">
          <input type="hidden" name="id" id="idavisoexcluir">
          <button type="submit" class="btn btn-danger">Apagar</button>
        </form>
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

  function trocarId($id){
    var campo = document.querySelector("#idavisoexcluir");
    campo.value = $id;
  }

  $(document).ready(function(){
    $('#paraTurma').on('change', function(){
      //$('#destinatario').toggle();
    });

    
  });

</script>