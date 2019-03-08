<?php
require_once "global.php";

$controleFase = new ControleFase();
$controleFase->idAluno = $_SESSION["iduser"];
$notificacoes = $controleFase->getNotificacoes();

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
    <?php if(count($notificacoes)>0) { ?>
    <li class="nav-item dropdown">
      <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">notifications</i>
          <span class="notification"><?= count($notificacoes) ?></span>
          <p class="d-lg-none d-md-block">
            avisos
          </p>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <?php foreach ($notificacoes as $idMissao => $nomeFase) : ?>
            <a class="dropdown-item" href="missao.php?id=<?= $idMissao ?>">O professor corrigiu a fase &nbsp;<strong><?= $nomeFase ?></strong></a>
          <?php endforeach ?>
        </div>
    </li>
    <?php } ?>
  </ul>
</div>