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
        <div class="col-lg-4 cards">
          <div class="card card-pricing card-raised">
            <div class="card-body">
              <h6 class="card-category">Hora Extra</h6>
              <div class="card-icon icon-rose">
                <i class="material-icons">alarm</i>
              </div>
              <h3 class="card-title">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </h3>
              <p class="card-description">
                Complete uma tarefa sábado ou domingo.
              </p>
              <p class="card-description">
                05/10
              </p>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <button class="btn btn-facebook">
                <i class="fab fa-facebook"></i> Compartilhe
                <div class="ripple-container"></div>
              </button>
              <button class="btn btn-rose">
                <i class="material-icons">search</i> Medalhas
                <div class="ripple-container"></div></button>
              </div>
            </div>
          </div>

          <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
              <div class="card-body">
                <h6 class="card-category">Pontualidade Britânica</h6>
                <div class="card-icon icon-primary">
                  <i class="material-icons">event</i>
                </div>
                <h3 class="card-title">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star"></i>
                </h3>
                <p class="card-description">
                  Entregue uma tarefa antes do prazo estipulado.
                </p>
                <p class="card-description">
                  08/10
                </p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <button class="btn btn-facebook">
                  <i class="fab fa-facebook"></i> Compartilhe
                  <div class="ripple-container"></div>
                </button>
                <button class="btn btn-rose">
                  <i class="material-icons">search</i> Medalhas
                  <div class="ripple-container"></div></button>
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
              <div class="card-body">
                <h6 class="card-category">Topzera</h6>
                <div class="card-icon icon-danger">
                  <i class="material-icons">whatshot</i>
                </div>
                <h3 class="card-title">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </h3>
                <p class="card-description">
                  Ganhe 20 pontos de experiência em uma semana
                </p>
                <p class="card-description">
                  01/20
                </p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <button class="btn btn-facebook">
                  <i class="fab fa-facebook"></i> Compartilhe
                  <div class="ripple-container"></div>
                </button>
                <button class="btn btn-rose">
                  <i class="material-icons">search</i> Medalhas
                  <div class="ripple-container"></div>
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

<?php include "rodape.php" ?>