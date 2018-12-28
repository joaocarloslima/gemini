<?php 
include "cabecalho.php";
require_once 'global.php';

$aluno = new Aluno();
$aluno->id = $_SESSION['iduser'];
$aluno->carregar();

$engajamento = new Engajamento();
$engajamento->idAluno = $aluno->id;

$perfiljogador = new perfiljogador();
$perfiljogador->idAluno = $aluno->id;
$perfiljogadorstr = $perfiljogador->perfil();

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
        <div class="col-lg-6 col-xl-3">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="assets/img/engajamento.jpg">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Engajamento</h6>
              <?php if ($engajamento->score()==null) : ?>
                <p class="card-description">Você ainda não realizou o teste de engajamento. Responda nove perguntas breves para descobrirmos qual é o seu nível de engajamento nesse bimestre.</p>
                <a href="engajamento.php" class="btn btn-rose btn-round" >Responder Teste</a>
                <?php else : ?>
                  <h4 class="card-title">Seu score é <strong><?php echo $engajamento->score();?></strong></h4>
                  <p class="card-description">
                    Essa pontuação indica que você tem um nível <strong><?php echo $engajamento->status();?></strong> de engajamento. o engajamento é composto por três variáveis, conforme os detalhes a seguir.
                  </p>
                  <button class="btn btn-sm <?php echo cor($engajamento->vigor());?>">
                    <i class="fas <?php echo icone($engajamento->vigor());?>"></i> 
                    Vigor <?php echo $engajamento->vigor();?>
                  </button>
                  <button class="btn btn-sm <?php echo cor($engajamento->dedicacao());?>">
                    <i class="fas <?php echo icone($engajamento->dedicacao());?>"></i> 
                    Dedicação <?php echo $engajamento->dedicacao();?>
                  </button>
                  <button class="btn btn-sm <?php echo cor($engajamento->absorcao());?>">
                    <i class="fas <?php echo icone($engajamento->absorcao());?>"></i> 
                    Absorção <?php echo $engajamento->absorcao();?>
                  </button>
                  <canvas id="graficoEngajamento" width="400" height="400"></canvas>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-3">
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
          <div class="col-lg-6 col-xl-3">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="#pablo">
                  <img class="img" src="assets/img/gamer.jpg">
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-gray">Perfil de Jogador</h6>
                <?php if ($perfiljogador->empreendedor()==null) : ?>
                  <p class="card-description">Você ainda não realizou o teste de perfil de jogador. Avalie algumas afirmações para entender melhor o que motiva você em um jogo.</p>
                  <a href="perfil_jogador.php" class="btn btn-rose btn-round">Responder Teste</a>

                  <?php else : ?>

                    <h4 class="card-title">Seu perfil é <strong><?php echo $perfiljogador->perfil();?></strong></h4>
                    <p class="card-description">
                      <?php echo $perfiljogador->descricao($perfiljogador->perfil());?>
                    </p>
                    <canvas id="graficoJogador" width="400" height="400"></canvas>
                  <?php endif ?>  

                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-3">
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
          </div>
        </div>
      </div>

      <?php include "rodape.php";

      mostrarAlerta("danger", "top");
      mostrarAlerta("success", "top");

      function cor($status)
      {
        if($status=="baixo" || $status=="baixa" || $status=="muito baixo" || $status=="muito baixa" ) return "btn-danger";
        if($status=="médio" || $status=="média" ) return "btn-warning";
        return "btn-success";
      }

      function icone($status)
      {
        if($status=="baixo" || $status=="baixa" || $status=="muito baixo" || $status=="muito baixa" ) return "fa-battery-empty";
        if($status=="médio" || $status=="média" ) return "fa-battery-half";
        return "fa-battery-full";
      }

      ?>

      <script>
        var ctx = document.getElementById("graficoEngajamento");
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["Vigor", "Dedicação", "Absorção"],
            datasets: [{
              label: 'Score',
              data: [
              <?php echo $engajamento->scoreVigor;?>, 
              <?php echo $engajamento->scoreDedicacao;?>, 
              <?php echo $engajamento->scoreAbsorcao;?>
              ],
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)'
              ],
              borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            },
            legend:{
              display: false
            }
          }
        });

        var ctx = document.getElementById("graficoJogador");
        var options = {
          scale: {
            ticks: {
              beginAtZero: true
            },
            legend: {
              display: false
            }
          }
        };
        var myChart2 = new Chart(ctx, {
          type: 'radar',
          data: {
            labels: ["Empreendedor", "Disruptor", "Espírito Livre", "Filantropo", "Jogador", "Socializador"],
            datasets: [{
              label: 'Score',
              data: [
              <?php echo $perfiljogador->scoreEmpreendedor;?>,
              <?php echo $perfiljogador->scoreDisruptor;?>,
              <?php echo $perfiljogador->scoreEspiritoLivre;?>,
              <?php echo $perfiljogador->scoreFilantropo;?>,
              <?php echo $perfiljogador->scoreJogador;?>,
              <?php echo $perfiljogador->scoreSocializador;?>
              ],
              backgroundColor: [
              'rgba(54, 162, 235, 0.2)'
              ],
              borderColor: [
              'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: options

        });

      </script>


