<?php 
include 'cabecalho.php'; 

$perguntas = [
  "01. Eu gosto de fazer cursos apenas para aprender coisas",
  "02. Eu geralmente refaço atividades até que elas fiquem perfeitas",
  "03. O caminho para conseguir algo é tão importante quanto o objetivo final",
  "04. Eu raramente desisto quando algo fica muito difícil",
  "05. Eu sou um dos primeiros a adotar uma nova tecnologia",
  "06. Eu me aproveito das falhas do sistema para levar vantagem",
  "07. Eu raramente tolero algo que não gosto",
  "08. As regras são feitas para serem quebradas",
  "09. Expressar-se é muito importante para mim",
  "10. Eu prefiro seguir uma história a explorar um ambiente",
  "11. Eu não gosto de ficar preso a muitas regras",
  "12. Eu gosto de encontrar surpresas escondidas em jogos e filmes",
  "13. Eu gosto de ajudar as pesssoas",
  "14. Eu gosto de investir meu tempo voluntariamente para manter comunidades",
  "15. Eu gosto de contribuir com conteúdo para comunidades on-line com o a Wikipedia",
  "16. Eu gosto de ensinar",
  "17. Ganhar é mais importante que participar",
  "18. Eu gosto de exibir as recompensas que recebo",
  "19. Eu fico feliz em doar itens para judar os outros",
  "20. Eu gosto de competir para estar no top dos rankings",
  "21. Eu uso redes sociais regularmente",
  "22. Eu gosto de conversar com as pessoas em redes sociais",
  "23. Considero o número de seguidores a medida mais importante para medir o sucesso de uma pessoa",
  "24. Eu gosto de compartilhar conteúdos com meus amigos e seguidores"
];

?>

<link href="assets/css/stars.css" rel="stylesheet" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


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
        <a class="navbar-brand" href="#pablo">Teste de Perfil de Jogador</a>
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
              <i class="fas fa-medal"></i>
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
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <div class="card-icon">
                <i class="material-icons">videogame_asset</i>
              </div>
              <h4 class="card-title">Questionário de Tipo de Jogador</h4>
            </div>
            <div class="card-body">
            	<h4>Informe uma escala de identificação para cada uma das afirmações abaixo.</h4>
              <form action="perfil_jogador_salvar.php" method="POST">
                <?php foreach ($perguntas as $pergunta) : ?>
                  <div class="row">
                    <div class="col-md-12">
                    	<h5><strong><?php echo $pergunta;?></strong></h5>
                      <?php gerarStars(substr($pergunta,0,2)); ?>
                    </div>
                  </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-success pull-right">Enviar Resposta</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include 'rodape.php'; ?>

 <?php

function gerarStars ($indice){
  echo "<div class='cont'>";
  echo "  <div class='stars'>";
  echo "    <input class='star star-5' id='star-5-$indice' type='radio' name='r$indice' value='5' required/>";
  echo "    <label class='star star-5' for='star-5-$indice'></label>";
  echo "    <input class='star star-4' id='star-4-$indice' type='radio' name='r$indice' value='4' />";
  echo "    <label class='star star-4' for='star-4-$indice'></label>";
  echo "    <input class='star star-3' id='star-3-$indice' type='radio' name='r$indice' value='3' />";
  echo "    <label class='star star-3' for='star-3-$indice'></label>";
  echo "    <input class='star star-2' id='star-2-$indice' type='radio' name='r$indice' value='2' />";
  echo "    <label class='star star-2' for='star-2-$indice'></label>";
  echo "    <input class='star star-1' id='star-1-$indice' type='radio' name='r$indice' value='1' />";
  echo "    <label class='star star-1' for='star-1-$indice'></label>";
  echo "  </div>";
  echo "</div>";

}