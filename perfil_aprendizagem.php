<?php 
include 'cabecalho.php'; 

$perguntas = [
  [1, "Você comprou uma câmera fotográfica profissonal. Para aprender a utilizar todos os recursos, você gostaria de:",
    ["R", "Instruções claras por escrito com listas e pontos do que fazer"],
    ["V", "Diagramas mostrando a câmera e o que cada parte faz."],
    ["A", "Ter a chance de fazer perguntas e falar sobre a câmera e suas características."],
    ["K", "Muitos exemplos de fotos boas e ruins e como melhorá-las."]
  ],
  [2, "Você está ajudando alguém que quer chegar ao autódromo. Você:",
    ["A", "Daria as indicações de direção."],
    ["V", "Desenharia, ou mostraria num mapa, ou daria um mapa a ela."],
    ["R", "Escreveria as indicações de direção."],
    ["K", "Iria com ela."]
  ],
  [3, "Você está prestes a comprar um celular. Fora o preço, o que mais poderia influenciar sua decisão?",
    ["R", "Ler os detalhes ou verificar suas características online."],
    ["K", "Usá-lo ou testá-lo."],
    ["A", "Um vendedor me explicando sobre suas características."],
    ["V", "Se o design é moderno e parece bonito."]
  ],
  [4, "Fora o preço, o que mais o(a) influenciaria na decisão de comprar um livro novo de não-ficção?",
    ["R", "Uma rápida leitura de partes do mesmo."],
    ["V", "A aparência dele é atraente."],
    ["A", "Um amigo fala sobre ele e o recomenda."],
    ["K", "Ele tem histórias da vida real, experiências e exemplos."]
  ],
  [5, "Você está planejando férias para um grupo. Você quer algum feedback deles sobre o plano. Você:",
    ["A", "Telefonaria, mandaria mensagem de texto ou enviaria um e-mail."],
    ["R", "Descreveria alguns dos pontos altos que eles irão experimentar."],
    ["V", "Usaria um mapa para mostrar os lugares a eles."],
    ["R", "Daria a eles uma cópia do itinerário impresso."]
  ],
  [6, "Em um site há um vídeo de como fazer um gráfico especial. Há uma pessoa falando, algumas listas e palavras descrevendo o que fazer e alguns diagramas. Você aprenderia mais:",
      ["K", "Observando as ações."],
      ["R", "Lendo as palavras."],
      ["A", "Ouvindo."],
      ["V", "Olhando os diagramas."]
  ],
  [7, "Lembre-se de uma ocasião em que você aprendeu a fazer algo novo. Evite escolher uma habilidade física, por exemplo, andar de bicicleta. Você aprendeu melhor:",
      ["V", "Diagramas, mapas e tabelas – pistas visuais."],
      ["R", "Instruções escritas – por exemplo, em manual ou livro."],
      ["A", "Ouvindo alguém explicar como e fazendo perguntas."],
      ["K", "Assistindo a uma demonstração."]
  ],
  [8, "Você vai escolher comida em um restaurante. Você:",
    ["A", "Ouviria o garçom ou pediria a amigos que recomendassem opções."],
    ["K", "Escolheria alguma coisa que você já comeu lá antes."],
    ["R", "Escolheria das descrições do cardápio."],
    ["V", "Olharia o que os outros estão comendo ou olharia as imagens de cada prato."]
  ],
  [9, "Você irá cozinhar algo como um presente especial. Você:",
    ["A", "Pediria sugestões a amigos."],
    ["R", "Usaria uma boa receita."],
    ["V", "Procuraria por ideias na internet ou em alguns livros de culinária pelas imagens."],
    ["K", "Cozinharia algo que sabe sem a necessidade de instruções."]
  ],
  [10, "Você terminou uma competição ou teste e gostaria de algum feedback. Você gostaria de receber feedback:",
    ["V", "Usando gráficos que mostrem o que você atingiu."],
    ["A", "De alguém que discuta tudo com você."],
    ["K", "Usando exemplos do que você fez."],
    ["R", "Usando uma descrição escrita dos seus resultados."]
  ],
  [11, "Você tem que apresentar um seminário para a sua turma. Você:",
    ["K", "Colheria vários exemplos e história para fazer a palestra ficar real e prática."],
    ["A", "Escreveria algumas palavras-chave e praticaria fazendo o discurso diversas vezes."],
    ["V", "Faria diagramas ou conseguiria gráficos que ajudassem a explicar as coisas."],
    ["R", "Escreveria o discurso e o aprenderia através de várias leituras repetidas do mesmo."]
  ],
  [12, "Você gosta de sites que têm:",
    ["A", "Canais de áudio onde eu possa ouvir música, programas de rádio ou entrevistas."],
    ["K", "Coisas em que eu possa clicar, mudar ou tentar."],
    ["R", "Descrições escritas interessantes, listas e explicações."],
    ["V", "Design interessante e características visuais."]
  ],
  [13, "Você prefere um professor que usa:",
    ["R", "Folhetos, livros ou leituras."],
    ["K", "Demonstrações, modelos ou sessões práticas."],
    ["A", "Perguntas e respostas, palestra, discussão em grupo ou palestrantes convidados."],
    ["V", "Diagramas, tabelas ou gráficos."]
  ],
  [14, "Você tem um problema no seu coração. Você preferiria que o médico:",
    ["A", "Descrevesse o que estava errado."],
    ["V", "Mostrasse a você um diagrama do que estava errado."],
    ["R", "Desse a você algo para ler que explicasse o que estava errado."],
    ["K", "Usasse um modelo de plástico para lhe mostrar o que estava errado."]
  ],
  [15, "Você quer aprender um novo programa, habilidade ou jogo no computador. Você:",
    ["A", "Falaria com pessoas que sabem sobre o programa."],
    ["K", "Usaria os controles ou o teclado."],
    ["R", "Leria as instruções escritas que vieram com o programa."],
    ["V", "Seguiria os diagramas no livro que veio com ele."]
  ],
  [16, "Um grupo de turistas quer saber sobre os parques e reservas de vida selvagem em suas redondezas. Você:",
    ["K", "Os levaria a um parque ou reserva de vida selvagem e caminharia com eles."],
    ["R", "Daria a eles livros ou panfletos sobre os parques ou reservas de vida selvagem."],
    ["V", "Mostraria mapas e imagens da internet."],
    ["A", "Falaria a respeito, ou arranjaria uma palestra para eles sobre os parques ou reservas de vida selvagem. "]
  ]
];

shuffle($perguntas);

$controleFase = new controleFase();
$controleFase->idFase = 1;
$controleFase->idAluno = $_SESSION["iduser"];
try{
  $controleFase->iniciar();
}catch(Exception $e){
  Erro::trataErro($e);
  $_SESSION["danger"] = "<strong>Ops.</strong> Erro ao iniciar fase";
}

?>

<link href="assets/css/stars.css" rel="stylesheet" />


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
        <a class="navbar-brand" href="#pablo">Teste de Perfil de Aprendizagem</a>
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
                <i class="material-icons">school</i>
              </div>
              <h4 class="card-title">Questionário de Perfil de Aprendizagem</h4>
            </div>
            <div class="card-body">
              <form action="perfil_aprendizagem_salvar.php" method="POST">
                <?php foreach ($perguntas as $pergunta) : 
                    $name = "r" . $pergunta[0];
                    $respostas = array_slice($pergunta, 2);
                    shuffle($respostas);
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <h5><strong><?php echo $pergunta[1];?></strong></h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 checkbox-radios">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="<?= $name?>" value="<?php echo $respostas[0][0];?>" checked> <?php echo $respostas[0][1];?>
                          <span class="circle"><span class="check"></span></span>
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="<?= $name?>" value="<?php echo $respostas[1][0];?>" > <?php echo $respostas[1][1];?>
                          <span class="circle"><span class="check"></span></span>
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="<?= $name?>" value="<?php echo $respostas[2][0];?>" > <?php echo $respostas[2][1];?>
                          <span class="circle"><span class="check"></span></span>
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="<?= $name?>" value="<?php echo $respostas[3][0];?>" > <?php echo $respostas[3][1];?>
                          <span class="circle"><span class="check"></span></span>
                        </label>
                      </div>
                    </div>
                  </div><br>
                <?php endforeach ?>
                <button id="btnEnviar" class="btn btn-success pull-right">Enviar Resposta</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include 'rodape.php'; ?>

  <script type="text/javascript">
    var btnEnviar = document.querySelector("#btnEnviar");
    var form = document.querySelector("form");
    btnEnviar.addEventListener("click", function(e){
      e.preventDefault();
      $.ajax({
        method: "POST",
        url: "concluir_fase.php",
        data: { idFase: 1, desempenho: 1 }
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
  </script>

