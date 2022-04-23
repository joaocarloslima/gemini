<?php include 'cabecalho.php'; ?>

<?php 
$controleFase = new ControleFase();
$controleFase->idFase = 3;
$controleFase->idAluno = $_SESSION["iduser"];
try{
  $controleFase->iniciar();
}catch(Exception $e){
  Erro::trataErro($e);
  $_SESSION["danger"] = "<strong>Ops.</strong> Erro ao iniciar fase";
}
?>

<link href="assets/css/engajamento.css" rel="stylesheet" />


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
        <a class="navbar-brand" href="#pablo">Teste de Engajamento</a>
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
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card">
            <div class="card-header card-header-icon card-header-rose">
              <div class="card-icon">
                <i class="material-icons">group</i>
              </div>
              <h4 class="card-title">Escala de Engajamento Escolar</h4>
            </div>
            <div class="card-body">
            	<h4>Enquanto estudante você faz determinadas taefas, como, por exemplo, assistir as aulas, ir à biblioteca, fazer trabalhos em grupo, estudar, etc. 
                Os itens a seguir se referem a sentimentos, crenças e comportamentos relacionados com a sua experiência como estudante.
                Por favor, responda a cada um dos itens de acordo com a escola respostas, cujos valores variam de 0 (se nunca teve esse sentimento ou crença) a 6 (se tem esse sentimento ou crença sempre).</h4>
              <form action="engajamento_salvar.php" method="POST">
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>1. As minhas tarefas como estudante me fazem sentir cheio(a) de energia</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r1" name="resposta1">
                    <input type="text" class="input-engajamento" id="q1" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>2. Creio que a escola tem significado</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r2" name="resposta2">
                    <input type="text" class="input-engajamento" id="q2" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>3. O tempo passa voando quando estou realizando minhas tarefas como estudante</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r3" name="resposta3">
                    <input type="text" class="input-engajamento" id="q3" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>4. Me sinto com força e energia quando estou estudando ou quando vou às aulas</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r4" name="resposta4">
                    <input type="text" class="input-engajamento" id="q4" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>5. Estou entusiasmado(a) com a escola</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r5" name="resposta5">
                    <input type="text" class="input-engajamento" id="q5" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>6. Esqueço tudo o que se passa ao meu redor quando estou concentrado(a) nos meus estudos</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r6" name="resposta6">
                    <input type="text" class="input-engajamento" id="q6" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>7. Os meus estudos me inspiram coisas novas</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r7" name="resposta7">
                    <input type="text" class="input-engajamento" id="q7" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>8. Quando me levanto de manhã tenho vontade de ir para as aulas ou estudar</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r8" name="resposta8">
                    <input type="text" class="input-engajamento" id="q8" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>9. Me sinto feliz quando estou fazendo tarefas relacionadas com os meus estudos</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r9" name="resposta9">
                    <input type="text" class="input-engajamento" id="q9" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>10. Estou orgulhoso(a) por estar na escola</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r10" name="resposta10">
                    <input type="text" class="input-engajamento" id="q10" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>11. Estou envolvido(a) nos meus estudos</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r11" name="resposta11">
                    <input type="text" class="input-engajamento" id="q11" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>12. As minhas tarefas como estudante não me cansam</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r12" name="resposta12">
                    <input type="text" class="input-engajamento" id="q12" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>                              
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>13. A escola é um desafio para mim</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r13" name="resposta13">
                    <input type="text" class="input-engajamento" id="q13" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>14. "Me deixo levar" quando realizo as minhas tarefas como estudante</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r14" name="resposta14">
                    <input type="text" class="input-engajamento" id="q14" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>     
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>15. Sou uma pessoa com força para enfrentar minhas tarefas como estudante</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r15" name="resposta15">
                    <input type="text" class="input-engajamento" id="q15" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>          
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>16. Tenho dificuldade de me desligar dos meus estudos</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r16" name="resposta16">
                    <input type="text" class="input-engajamento" id="q16" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>                                 
                <div class="row">
                  <div class="col-md-12">
                  	<h5><strong>17. Quando estou realizando minhas tarefas escolares não paro, mesmo que não me sinta bem</strong></h5>
                    <input type="hidden" class="input-engajamento-resposta" id="r17" name="resposta17">
                    <input type="text" class="input-engajamento" id="q17" disabled="">
                    <div class="form-group bmd-form-group">
                      <div class="slider"></div>
                    </div>
                  </div>
                </div>                
                <button id="btnEnviar" class="btn btn-success btn-fill">Enviar Resposta</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'rodape.php'; ?>


  <script>
    var btnEnviar = document.querySelector("#btnEnviar");
    var form = document.querySelector("form");
    btnEnviar.addEventListener("click", function(e){
      e.preventDefault();
      $.ajax({
        method: "POST",
        url: "concluir_fase.php",
        data: { idFase: 3, desempenho: 1 }
      })
      .done(function(msg){
        if (msg=="sucesso"){
          swal({
            title: "Parabéns",
            html: '<i class="fas fa-star"></i> Você ganhou 10 XP ' +
            'por completar essa atividade.<br>',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            type: "success"
          }).then(function() {
            form.submit();
          }).catch(swal.noop); 
        }else{
          alert("deu ruim" + msg);
        }
      })
      .fail(function(jqXHR, textStatus, msg){
        alert(msg);
      });


    });

    var sliders = document.querySelectorAll('.slider');
    var inputsQ = document.querySelectorAll('.input-engajamento');
    var inputsR = document.querySelectorAll('.input-engajamento-resposta');
    var i = 0;

    sliders.forEach(function(slider){
     noUiSlider.create(slider, {
       start: 4,
       connect: [true, false],
       step: 1,
       range: {
         'min': 0,
         'max': 6
       },
       format: {
         to: function (value) {
           return parseInt(value);
         },
         from: function (value) {
           return parseInt(value);
         }
       },
       behaviour: 'tap-drag',
     });

     tratarSlider(slider, inputsQ[i], inputsR[i]);

     i++;

   });

    function tratarSlider (slider, inputQ, inputR){
     slider.noUiSlider.on('update', function (values, handle) {
      var resposta = ["Nunca", "Quase nunca", "Raramente", "Algumas vezes", "Frequentemente", "Muito frequentemente", "Sempre"];
      inputQ.value = resposta[values[handle]];
      inputR.value = values[handle];
    });
   }
 </script>

<?php
    mostrarAlerta("danger", "top");
    mostrarAlerta("success", "top");

    ?>
