<?php 
include "cabecalho.php";

$fase = new Fase();
$fase->id = $_GET["id"];
$fase->carregar();

$missao = new Missao();
$missao->id = $fase->idMissao;
$missao->carregar();

$questionario = new Questionario();
$questionario->idFase = $fase->id;
$questionario->idAluno = $_SESSION["iduser"];
$questoes = $questionario->listarQuestoes();


$controleFase = new ControleFase();
$controleFase->idFase = $fase->id;
$controleFase->idAluno = $_SESSION["iduser"];
$controleFase->iniciar();

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
                          <i class="material-icons">remove_circle_outline</i> <?= $cont++ ?>
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
            <form id="form" action="missao.php">
              <input type="hidden" name="idFase" value="<?= $fase->id ?>">
              <input type="hidden" name="id" value="<?= $missao->id ?>">
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
                            <td colspan="2">
                              <h3><?php echo $questao->enunciado ?></h3>
                            </td>
                          </tr>
                          <?php 
                          $alternativas = $questao->alternativas;
                          foreach ($alternativas as $alternativa) :
                            $alternativa_checked = ($alternativa->selecionada)?"checked":"";
                            ?>
                            <tr>
                              <td style="width: 3%">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input name="a<?= $alternativa->id?>" class="form-check-input" type="checkbox" value="" id="a<?= $alternativa->id?>" <?= $alternativa_checked ?>>
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td class="col-md-11"><?= $alternativa->texto ?></td>
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
          <div class="col-md-12">
            <button class="btn btn-primary disabled" id="btnFinalizar">
              <i class="material-icons">done</i>
              Finalizar Questionário
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include "rodape.php" ?>

  <script type="text/javascript">

    $(function(){
      $('input:checkbox:checked').each(function(){
        let idquestao = $(this).closest('.tab-pane').attr('id');
        $("[href*='#" + idquestao + "']").children('i').text('check_circle');
      });
      let qtde_respondidas = $("i:contains('check_circle')").length;
      if (qtde_respondidas==<?= $cont-1 ?>) $('#btnFinalizar').removeClass('disabled');

    });

    $(".form-check-input").on("click", function(){
      return false;
    });

    $("tr").on("click", function(){
      let checkbox = $(this).find("input").first();
      checkbox.prop("checked", !checkbox.prop("checked"));
      var div_questao = $('div.tab-pane.active');
      var alternativas_selecionadas = $(div_questao).find('input:checkbox:checked');
      if(alternativas_selecionadas.length > 0) {
        $('a.nav-link.active').children('i').text('check_circle');
        let qtde_respondidas = $("i:contains('check_circle')").length;
        if (qtde_respondidas==<?= $cont-1 ?>) $('#btnFinalizar').removeClass('disabled');
      }else{
        $('a.nav-link.active').children('i').text('remove_circle_outline');
        $('#btnFinalizar').addClass('disabled')
      }
      $.ajax({
        method: "POST",
        url: "questionario_controller.php",
        data: { 
          idAlternativa: checkbox.attr("id").substr(1,),
          idAluno: "<?php echo $_SESSION['iduser']?>",
          acao: "responder" 
        },
        success: (function(msg){
        //console.log(msg)
      })
      });
    });

    $('#btnFinalizar').on("click", function(e){
      e.preventDefault();
      $.ajax({
        method: "POST",
        url: "corrigir_questionario.php",
        data: $('#form').serialize()
      })
      .done(function(msg){
        if (msg!="erro"){
          swal({
            title: "Parabéns",
            html: '<i class="fas fa-star"></i> Você ganhou ' + parseInt(msg*<?= $fase->xp?>) + ' XP ' +
            'por completar essa atividade.<br>',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            type: "success"
          }).then(function() {
            $('#form').submit();
          }).catch(swal.noop); 
        }else{
          alert("deu ruim" + msg);
        }
      })
      .fail(function(jqXHR, textStatus, msg){
        alert(msg);
      });
    });

  </script>

  <?php 
  mostrarAlerta("danger", "top");
  mostrarAlerta("success", "top");
  ?>