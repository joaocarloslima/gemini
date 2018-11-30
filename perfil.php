<?php 
include "cabecalho.php";
require_once 'global.php';

$aluno = new Aluno();
$aluno->id = $_SESSION['iduser'];
$aluno->carregar();

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
        <a class="navbar-brand" href="#pablo">Meu Perfil</a>
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
              <span class="score">74</span>
              <i class="fas fa-star"></i>
              <p class="d-lg-none d-md-block">
                XP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span class="score">4</span>
              <i class="material-icons">signal_cellular_alt</i>
              <p class="d-lg-none d-md-block">
                Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <span class="score">12</span>
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
        <div class="col-md-3">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <div class="card-icon">
                <i class="material-icons">perm_identity</i>
              </div>
              <h4 class="card-title">Dados de Acesso</h4>
            </div>
            <div class="card-body">
              <form action="alunos_alterar.php" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Nome Completo</label>
                      <input type="text" class="form-control" value="<?php echo $aluno->nome?>" required="on" name="nome">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email</label>
                      <input type="email" class="form-control" value="<?php echo $aluno->email?>" required="on" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Nova Senha</label>
                      <input type="password" class="form-control" autocomplete="new-password"name="senha">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p>mudar foto...</p>
                  </div>
                </div>
                <button type="submit" class="btn btn-rose pull-right">Gravar Dados</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="assets/img/engajamento.jpg">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Engajamento</h6>
              <h4 class="card-title">Seu score é <strong>3.75</strong></h4>
              <p class="card-description">
                Essa pontuação indica que você tem um alto nível de engajamento.
              </p>
              <p>Vigor: 3</p>
              <p>Dedicação: 5</p>
              <p>Absorção: 4</p>
              <a href="engajamento.php" class="btn btn-rose btn-round" >Responder Teste</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="assets/img/aprendizagem.jpg">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Perfil de Aprendizagem</h6>
              <h4 class="card-title">Seu perfil é <strong>Visual</strong></h4>
              <p class="card-description">
                Isso indica que você consegue aprender através de representações gráficas e modelos visuais. Tente estudar através de mapas mentais e gráficos.
              </p>
              <button class="btn btn-default btn-round" disabled>Teste indisponível</button>
            </div>
          </div>
        </div>        
        <div class="col-md-3">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="assets/img/gamer.jpg">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Perfil de Jogador</h6>
              <h4 class="card-title">Seu perfil é <strong>Competitivo</strong></h4>
              <p class="card-description">
                Isso indica que você se motiva através de comparação com os outros.
              </p>
              <button class="btn btn-default btn-round" disabled>Teste indisponível</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include "rodape.php"; ?>
<?php 
  mostrarAlerta("danger", "top");
  mostrarAlerta("success", "top");
?>?>
