<?php 
require_once("global.php");
include "cabecalho.php";

$missoes = new Missao();
$missoes->buscarTodas();

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
        <a class="navbar-brand" href="#">Missões</a>
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
            <div class="card-header card-header-text card-header-warning">
              <div class="card-text">
                <i class="fas fa-rocket"></i>
                <h4 class="card-title">Cadastro de Missões</h4>
                <p class="card-category">Adicione missões para as turmas e defina as fases</p>
              </div>
            </div>
            <div class="card-body">
              <div class="toolbar text-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus left"></i> nova missão</button>
              </div>
              <div class="material-datatables">
                <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th></th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Liberada</th>
                      <th>Level</th>
                      <th>Turma</th>
                      <th class="text-right"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($missoes->listaCompleta as $missao) : ?>
                      <tr>
                        <td><?= $missao->id?></td>
                        <td>
                          <img class="photo" src="<?= $missao->imagem ?>" />
                        </td>
                        <td>
                          <?= $missao->nome ?>
                          <?php if ($missao->atividadesParaAvaliar > 0) : ?>
                            <span class="badge badge-danger badge-pill tooltiped" data-toggle="tooltip" data-placement="top" title="<?= $missao->atividadesParaAvaliar ?> atividades para avaliar">
                              <?= $missao->atividadesParaAvaliar ?>
                            </span>
                          <?php endif ?>
                        </td>
                        <td><?= (strlen($missao->descricao)>30)?substr($missao->descricao,0,30)."...":$missao->descricao ?></td>
                        <td class="text-center">
                          <a  href="#" class="btn-liberada" data-id="<?= $missao->id?>">
                            <?= $missao->liberada==0?"<i class='fas fa-lock text-danger'></i>":"<i class='fas fa-lock-open text-success'></i>" ?>
                          </a>
                        </td>
                        <td class="text-center"><?= $missao->levelminimo ?></td>
                        <td class="text-center"><?= $missao->turma ?></td>
                        <td class="text-right">
                          <a href="fases.php?idmissao=<?= $missao->id ?>" class="btn btn-link btn-info btn-just-icon"><i class="fas fa-tasks"></i></a>
                          <a href="missao_duplicar.php?idmissao=<?= $missao->id?>" class="btn btn-link btn-success btn-just-icon edit"><i class="material-icons">library_add</i></a>
                          <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">edit</i></a>

                          <button class="btn btn-link btn-danger btn-just-icon" data-toggle="modal" data-target="#modalexcluir" onclick="trocarId(<?= $missao->id?>)">
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

    <?php include "rodape.php" ?>

  </div>
</div>

<!--modal novo -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Nova Missão</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="missao_inserir.php" class="form-horizontal" enctype="multipart/form-data" id="form-missao">
          <input type="hidden" name="idMissao" value="" id="idMissao">
          <input type="hidden" name="acao" value="" id="acao">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="nome" class="bmd-label-floating">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
                <span class="bmd-help">Dê um título para a missão, algo como "Descobrir como funcionam as macros"</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="levelminimo" class="bmd-label-floating">Level Mínimo</label>
                <input type="number" class="form-control" id="levelminimo" name="levelminimo">
                <span class="bmd-help">Essa missão aparecerá bloqueada para quem não atingiu o level mínimo</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label for="descricao" class="bmd-label-floating">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <label class="col-md-3"></label>
                <div class="col-md-9">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="" name="liberada"> Liberado
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="checkbox-radios">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="turma" value="1" checked=""> 1D - A
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="turma" value="2"> 1D - B
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="turma" value="3"> 1C - A
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="turma" value="4"> 1C - B
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>   
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <h4 class="title">Imagem da Missão</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img src="assets/img/image_placeholder.jpg" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Escolher imagem</span>
                    <span class="fileinput-exists">trocar</span>
                    <input type="file" name="imagem">
                  </span>
                  <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>
                </div>
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

<div class="modal fade modal-mini modal-primary" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que quer excluir essa missão? Se fizer isso, serão perdidas todas as fases, tarefas, questionário e entregas vinculadas à ela. Essa ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Deixa pra lá</button>
        <form action="missao_excluir.php" method="POST">
          <input type="hidden" name="id" id="idmissaoexcluir">
          <button type="submit" class="btn btn-danger">Apagar</button>
        </form>

      </div>
    </div>
  </div>
</div>
<script>
  $('.tooltiped').tooltip();

  function trocarId($id){
    var campo = document.querySelector("#idmissaoexcluir");
    campo.value = $id;
  }

  $(document).ready(function() {
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "todos"]
      ],
      "columnDefs": [
      { "orderable": false, "targets": [0,1,3,7] }
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

    var table = $('#datatable').DataTable();

    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      var data = table.row($tr).data();
      var id = data[0];
      $.ajax({
        method: "POST",
        url: "missao_buscar.php",
        data: {id : id}
      })
      .done(function(msg) {
        if (msg != "erro"){
          $("#myModal").find('h3').text("Editar Missão");
          $("#form-missao").attr("action", "missao_atualizar.php");
          var missao = JSON.parse(msg);
          $("#idMissao").val(missao.id);
          $("#acao").val("editar");
          $("#nome").val(missao.nome);
          $("#levelminimo").val(missao.levelminimo);
          $("#descricao").val(missao.descricao);
          var $radioTurma = $('input:radio[name=turma]');
          $radioTurma.filter('[value='+missao.idTurma+']').prop('checked', true);
        }
      });

      $('#myModal').modal('show');

    });

  });

    //tratamento dos botoes de libaracao que mudam o status via ajax
    var botoesLiberar = document.querySelectorAll(".btn-liberada");
    botoesLiberar.forEach(function(botao){
      botao.addEventListener("click", function(event){
        event.preventDefault();
        var idMissao = this.getAttribute("data-id");
        $.ajax({
          method: "POST",
          url: "missao_atualizar.php",
          data: { id: idMissao, acao: "swapliberada" }
        })
        .done(function(msg){
          var icone = botao.querySelector("i");
          if (icone.classList.contains('fa-lock')){
            icone.classList.remove('fa-lock');
            icone.classList.remove('text-danger');
            icone.classList.add('fa-lock-open');
            icone.classList.add('text-success');
          }else{
            icone.classList.remove('fa-lock-open');
            icone.classList.remove('text-success');
            icone.classList.add('fa-lock');
            icone.classList.add('text-danger');
          }
        });
      });

    });
  </script>

  <?php
  mostrarAlerta("success", "top");
  mostrarAlerta("danger", "top");
  ?>