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
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span>74</span>
              <i class="fas fa-star"></i>
              <p class="d-lg-none d-md-block">
                XP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span>4</span>
              <i class="material-icons">signal_cellular_alt</i>
              <p class="d-lg-none d-md-block">
                Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span>12</span>
              <i class="fa fa-medal"></i>
              <p class="d-lg-none d-md-block">
                Medalha
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <span class="notification">3</span>
              <p class="d-lg-none d-md-block">
                avisos
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Nova missão liberada</a>
              <a class="dropdown-item" href="#">Novo feedback na tarefa 3</a>
              <a class="dropdown-item" href="#">Questionário 3 disponível</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="missoes.php">missões / </a></li>
            <li> fases</li>
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
              <div class="toolbar">

              </div>
              <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Tipo</th>
                      <th>Prazo</th>
                      <th>XP</th>
                      <th class="text-right"></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Tipo</th>
                      <th>Prazo</th>
                      <th>XP</th>
                      <th class="text-right"></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($fases->listaCompleta as $fase) : ?>
                      <tr>
                        <td>
                          <img class="photo" src="assets/img/default-avatar.png" />
                        </td>
                        <td><?= utf8_encode($fase->nome) ?></td>
                        <td><?= substr(utf8_encode($fase->descricao),0,30)."..." ?></td>
                        <td><?= $fase->tipo ?></td>
                        <td><?= $fase->prazo ?></td>
                        <td><?= $fase->xp ?></td>
                        <td class="text-right">
                          <a href="#" class="btn btn-link btn-info btn-just-icon"><i class="fas fa-tasks"></i></a>
                          <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                          <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
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

<?php include "rodape.php" ?>
<script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "todos"]
      ],
      "columnDefs": [
      { "orderable": false, "targets": [0,6] }
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


