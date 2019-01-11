<?php include "cabecalho.php" ?>

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
        <a class="navbar-brand" href="#pablo">Ranking</a>
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
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                  <i class="material-icons">signal_cellular_alt</i>
                </div>
                <h4 class="card-title">Ranking</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead class=" text-primary">
                      <tr><th>
                        #
                      </th>
                      <th>

                      </th>
                      <th>
                        Nome
                      </th>
                      <th>
                        XP
                      </th>
                      <th>
                        Level
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/default-avatar.png" />
                        </div>
                      </td>
                      <td>
                        Fernanda
                      </td>
                      <td>
                        50
                      </td>
                      <td>
                        4
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/default-avatar.png" />
                        </div>
                      </td>
                      <td>
                        Fábio
                      </td>
                      <td>
                        48
                      </td>
                      <td>
                        4
                      </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/faces/card-profile1-square.jpg" />
                        </div>
                      </td>
                      <td>
                        Cristiana
                      </td>
                      <td>
                        40
                      </td>
                      <td>
                        3
                      </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/default-avatar.png" />
                        </div>
                      </td>
                      <td>
                        Pedro
                      </td>
                      <td>
                        35
                      </td>
                      <td>
                        3
                      </td>
                    </tr>
                    <tr>
                      <td>
                        5
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/faces/card-profile2-square.jpg" />
                        </div>
                      </td>
                      <td>
                        Natália
                      </td>
                      <td>
                        31
                      </td>
                      <td>
                        2
                      </td>
                    </tr>
                    <tr class="table-info">
                      <td>
                        6
                      </td>
                      <td>
                        <div class="photo">
                          <img src="assets/img/faces/card-profile2-square.jpg" />
                        </div>
                      </td>
                      <td>
                        Tarik
                      </td>
                      <td>
                        25
                      </td>
                      <td>
                        2
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info" data-header-animation="false">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Posição no Ranking</h4>
              <p class="card-category">Últimos 30 dias</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "rodape.php" ?>