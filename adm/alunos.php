<?php 
require_once("global.php");
include "cabecalho.php";

$alunos = new Alunos();
$alunos->buscarTodos();

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
        <a class="navbar-brand" href="#">Alunos</a>
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
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <h4 class="card-title">Alunos Cadastrados</h4>
            </div>
            <div class="card-body">
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Turma</th>
                      <th>XP</th>
                      <th>Nível</th>
                      <th>Engajamento</th>
                      <th>Jogador</th>
                      <th>Aprendizagem</th>
                      <th class="text-right"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($alunos->lista as $aluno) : ?>
                      <tr>
                        <td>
                          <img class="photo" src="../<?= $aluno->foto?>" />
                        </td>
                        <td><?= $aluno->nome ?></td>
                        <td><?= $aluno->email ?></td>
                        <td><?= $aluno->turma ?></td>
                        <td><?= $aluno->xp ?></td>
                        <td><?= $aluno->nivel ?></td>
                        <td class="text-center"><?= $aluno->engajamento ?></td>
                        <td><?= $aluno->perfilJogador ?></td>
                        <td><?= $aluno->perfilAprendizagem ?></td>
                        <td class="text-right">
                          <a href="#" class="btn btn-link btn-warning btn-just-icon edit" data-toggle="modal" data-target=".modal-senha" onclick="trocarId(<?= $aluno->id?>, '#idAlunoSenhas')"><i class="material-icons">lock</i></a>
                          <a href="#" class="btn btn-link btn-danger btn-just-icon remove" data-toggle="modal" data-target="#modalexcluir" onclick="trocarId(<?= $aluno->id?>, '#idAlunoExcluir')"><i class="material-icons">close</i></a>
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

<div class="modal fade modal-mini modal-primary" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja apagar esse aluno? Todas as informações referente a ele serão perdidas. Essa ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Deixa pra lá</button>
        <form action="aluno_excluir.php" method="POST">
          <input type="hidden" name="id" id="idAlunoExcluir">
          <button type="submit" class="btn btn-danger">Apagar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-senha" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-body">
          <form class="form" method="POST" action="alunos_alterar_senha.php">
            <input type="hidden" name="id" id="idAlunoSenhas">
            <p class="description text-center">Digite a nova senha</p>
            <div class="card-body">
              <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                  </div>
                  <input type="password" class="form-control" name="senha">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn btn-primary btn-link btn-wd btn-lg">salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php include "rodape.php" ?>

<?php
mostrarAlerta("success", "top");
mostrarAlerta("danger", "top");
?>

<script>

 function trocarId(id, elemento ){
  var campo = document.querySelector(elemento);
  campo.value = id;
}

$(document).ready(function() {
  $('#datatables').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "todos"]
    ],
    "columnDefs": [
    { "orderable": false, "targets": [0,8] }
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

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

