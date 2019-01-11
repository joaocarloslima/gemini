<?php
require_once "global.php";

$controleFase = new ControleFase();
$controleFase->idAluno = $_SESSION["iduser"];

?>

<div class="collapse navbar-collapse justify-content-end">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Pontos de Experiência (XP)">
        <span class="score"><?= $controleFase->getXPDoAluno(); ?></span>
        <i class="fas fa-star"></i>
        <p class="d-lg-none d-md-block">
          XP
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Nível (10XP para nível 5)">
        <span class="score">4</span>
        <i class="material-icons">signal_cellular_alt</i>
        <p class="d-lg-none d-md-block">
          Level
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Medalhas conquistadas">
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