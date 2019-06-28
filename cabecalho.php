<?php 
  include "verificar_login.php";
  include "mostrar_alerta.php";
  require_once "global.php";

  $aluno = new Aluno();
  $aluno->id = $_SESSION["iduser"];
  $aluno->carregar();

?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Gemini
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.0.2" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="index.php" class="simple-text logo-mini">
          G
        </a>
        <a href="index.php" class="simple-text logo-normal">
          Gemini
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?= $aluno->foto ?>" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $_SESSION["user"] ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="perfil.php">
                    <span class="sidebar-mini"> 
                      <i class="material-icons">person</i>
                    </span>
                    <span class="sidebar-normal"> Meu Perfil </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="alunos_logout.php">
                    <span class="sidebar-mini"> 
                      <i class="material-icons">close</i>
                    </span>
                    <span class="sidebar-normal"> Sair </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF'])=='dashboard.php')?'active':''; ?>">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item <?php echo (
              basename($_SERVER['PHP_SELF'])=='missoes.php' || 
              basename($_SERVER['PHP_SELF'])=='missao.php'  || 
              basename($_SERVER['PHP_SELF'])=='fase_atividade.php' ||
              basename($_SERVER['PHP_SELF'])=='fase_questionario.php'
            )?'active':''; 

            ?>">
            <a class="nav-link" href="missoes.php">
              <i class="fas fa-rocket"></i>
              <p> Missões </p>
            </a>
          </li>
          <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF'])=='ranking.php')?'active':''; ?>">
            <a class="nav-link" href="ranking.php">
              <i class="material-icons">poll</i>
              <p> Ranking </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
