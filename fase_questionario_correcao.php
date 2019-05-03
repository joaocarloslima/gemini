<?php 
include "cabecalho.php";

$fase = new Fase();
$fase->id = $_GET["id"];
$fase->carregar();

$missao = new Missao();
$missao->id = $fase->idMissao;
$missao->carregar();

//verificar se aluno já respondeu
$controleFase = new ControleFase();
$controleFase->idFase = $_GET["id"];
$controleFase->idAluno = $_SESSION["iduser"];
$controleFase->carregar();
$respondido =  ($controleFase->xp != NULL);


$questionario = new Questionario();
$questionario->idFase = $fase->id;
$questionario->idAluno = $_SESSION["iduser"];
$questoes = $questionario->listarQuestoes();

$prazo = strtotime($fase->prazo);
$hoje = strtotime(date('Y-m-d H:i:s'));
$prazoEsgotado = ($prazo < $hoje);

?>
<link rel="stylesheet" type="text/css" href="adm/assets/css/missoes.css">
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
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="missoes.php">Missões</a></li>
            <li class="breadcrumb-item"><a href="missao.php?id=<?= $missao->id?>"><?= $missao->nome ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $fase->nome ?></li>
          </ol>
        </nav>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h2><?= $fase->nome ?></h2>
        </div>
        <?php if (!$respondido || !$prazoEsgotado): ?>
          <div class="alert alert-warning col-md-12" role="alert">
            Você ainda não pode ver a correção. Responda o questionário e aguarde o término do prazo.
          </div>
          <?php else : ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-rose">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Questões:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <?php 
                        $cont = 1;
                        foreach ($questoes as $questao) : 
                          ?>
                          <li class="nav-item">
                            <a class="nav-link <?php echo ($cont==1)?"active":"" ?>" href="#q<?= $cont?>" data-toggle="tab">
                              <i class="material-icons">check_circle</i> <?= $cont++ ?>
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <?php 
                    $cont = 1;
                    foreach ($questoes as $questao) : 
                      ?>
                      <div class="tab-pane <?php echo ($cont==1)?"active":"" ?>" id="q<?= $cont++ ?>">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <td colspan="3">
                                <h3><?php echo $questao->enunciado ?></h3>
                              </td>
                            </tr>
                            <?php 
                            $alternativas = $questao->alternativas;
                            foreach ($alternativas as $alternativa) :
                              $alternativa_checked = ($alternativa->selecionada)?"checked":"";
                              ?>
                              <tr class="<?= ($alternativa->correta)?'table-success':''?>">
                                <td style="width: 3%">
                                  <?php 
                                  if ($alternativa->selecionada && $alternativa->correta) 
                                    echo "<i class='fas fa-check text-success'></i>";
                                  elseif ($alternativa->selecionada && !$alternativa->correta)
                                    echo "<i class='fas fa-times text-danger'></i>";
                                  ?>
                                </td>
                                <td style="width: 3%">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input name="a<?= $alternativa->id?>" class="form-check-input" type="checkbox" value="" id="a<?= $alternativa->id?>" <?= $alternativa_checked ?> disabled>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td class="col-md-11" >
                                  <?= $alternativa->texto ?>
                                </td>
                              </tr>
                            <?php endforeach //alternativas ?>
                          </tbody>
                        </table>
                      </div>
                    <?php endforeach //questoes ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endif //verifica se já foi respondido ?>
        </div>
      </div>
    </div>

    <?php include "rodape.php" ?>

    <?php 
    mostrarAlerta("danger", "top");
    mostrarAlerta("success", "top");
    ?>