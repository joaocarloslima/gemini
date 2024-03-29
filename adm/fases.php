<?php 
require_once("global.php");
include "cabecalho.php";

$fases = new Fase();
$fases->buscarFasesDaMissao($_GET["idmissao"]);

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
        <a class="navbar-brand" href="#">Fases</a>
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
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="missoes.php">Missões</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $fases->missao ?></li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="fas fa-tasks"></i>
              </div>
              <h4 class="card-title">Fases da Missão <strong><?= $fases->missao ?></strong></h4>
            </div>
            <div class="card-body">
              <div class="toolbar text-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus left"></i> nova fase</button>
              </div>
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Tipo</th>
                      <th>Prazo</th>
                      <th>XP</th>
                      <th class="text-right"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($fases->listaCompleta as $fase) : ?>
                      <tr>
                        <td><?= $fase->id ?></td>
                        <td>
                          <?= $fase->nome ?>
                          <?php if ($fase->atividadesParaAvaliar > 0) : ?>
                            <span class="badge badge-danger badge-pill tooltiped" data-toggle="tooltip" data-placement="top" title="<?= $fase->atividadesParaAvaliar ?> atividades para avaliar">
                              <?= $fase->atividadesParaAvaliar ?>
                            </span>
                          <?php endif ?>
                        </td>
                        <td><?= substr($fase->descricao,0,30)."..." ?></td>
                        <td><?= $fase->tipo ?></td>
                        <td><?= $fase->prazoFormatado ?></td>
                        <td><?= $fase->xp ?></td>
                        <td class="text-right">
                          <?php if ($fase->tipo == "Questionário") :?>
                            <a href="fase_questionario.php?id=<?= $fase->id?>" class="btn btn-link btn-success btn-just-icon"><i class="fas fa-question"></i></a>
                          <?php elseif ($fase->anexo) : ?>
                            <a href="<?php echo $fase->anexo ?>" target="_blank" class="btn btn-link btn-primary btn-just-icon"><i class="material-icons">attach_file</i></a>
                          <?php endif ?>
                          <a href="avaliar_fase.php?id=<?= $fase->id?>" class="btn btn-link btn-info btn-just-icon"><i class="fas fa-file-signature"></i></a>
                          <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">edit</i></a>
                          <a href="#" class="btn btn-link btn-danger btn-just-icon" data-toggle="modal" data-target="#modalexcluir" onclick="trocarId(<?= $fase->id?>)"><i class="material-icons">close</i></a>
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

<!--modal novo -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Nova Fase</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="fase_inserir.php" class="form-horizontal" enctype="multipart/form-data" id="form-fase">
          <input type="hidden" name="idFase" id="idFase">
          <input type="hidden" name="idMissao" value="<?= $_GET["idmissao"] ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="nome" class="bmd-label-floating">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
                <span class="bmd-help">Dê um título para a fase, algo como "Teste seus conhecimentos sobre..."</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label for="xp" class="bmd-label-floating">XP</label>
                <input type="number" class="form-control" id="xp" name="xp">
                <span class="bmd-help">Qual é o XP máximo que o aluno ganha ao completar a fase</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <input type="datetime-local" class="form-control" id="prazo" name="prazo">
                <span class="bmd-help">Prazo para término da fase</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="descricao" class="bmd-label-floating">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="10"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="checkbox-radios">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="tipo" value="Questionário" checked=""> Questionário
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="tipo" value="Atividade"> Atividade
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>   
            </div>
          </div>
          <div class="row" id="campo-anexo">
            <div class="col-md-12">
              <div class="">
                <input type="file" class="form-file-simple" id="arquivo" name="arquivo" value="anexar">
              </div>
              <span id="helper-anexo"></span>
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

<div class="modal fade modal-mini modal-primary" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que quer excluir essa fase? Se fizer isso, serão perdidas todas as tarefas, questionário e entregas vinculadas à ela. Essa ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Deixa pra lá</button>
        <form action="fase_excluir.php" method="POST">
          <input type="hidden" name="id" id="idfaseexcluir">
          <input type="hidden" name="idMissao" value="<?= $_GET['idmissao']?>">
          <button type="submit" class="btn btn-danger">Apagar</button>
        </form>

      </div>
    </div>
  </div>
</div>


<?php include "rodape.php" ?>
<script>
  $('.tooltiped').tooltip();

  function trocarId($id){
    var campo = document.querySelector("#idfaseexcluir");
    campo.value = $id;
  }

  $('#myModal input[name=tipo').on('change', function() {
   if ($('input[name=tipo]:checked', '#myModal').val() == "Atividade"){
    $("#campo-anexo").show();
  }else{
    $("#campo-anexo").hide();
  }
});

  $(document).ready(function() {
    $("#campo-anexo").hide();
    
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "todos"]
      ],
      "columnDefs": [
      { "orderable": false, "targets": [5] }
      ],
      language: {
        search: "_INPUT_",
        searchPlaceholder: "buscar...",
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nenhum registro encontrado",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum registro",
        "infoFiltered": "(filtrado de _MAX_ registros)",
        "paginate": {
          "next": "próxima",
          "last": "última",
          "first": "primeira",
          "previous": "anterior"
        }
      }
    });

    var table = $('#datatables').DataTable();

    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      var data = table.row($tr).data();
      var id = data[0];
      $.ajax({
        method: "POST",
        url: "fase_buscar.php",
        data: {id : id}
      })
      .done(function(msg) {
        if (msg != "erro"){
          $("#myModal").find('h3').text("Editar Fase");
          $("#form-fase").attr("action", "fase_editar.php");
          var fase = JSON.parse(msg);
          $("#idFase").val(fase.id);
          $("#nome").val(fase.nome);
          $("#xp").val(fase.xp);
          $("#prazo").val(fase.prazoLocalTime);
          $("#descricao").val(fase.descricao);
          var $radioTipo = $('input:radio[name=tipo]');
          if (fase.tipo == "Atividade"){
            $radioTipo.filter('[value=Atividade]').prop('checked', true);
            $("#helper-anexo").text("Anexo atual: [" + fase.anexo + "]");
            $("#campo-anexo").show();
          }else{
            $radioTipo.filter('[value=Questionário]').prop('checked', true);
            $("#campo-anexo").hide();
          }
        }
      });

      $('#myModal').modal('show');

    });

  });
</script>


<?php
mostrarAlerta("success", "top");
mostrarAlerta("danger", "top");
?>