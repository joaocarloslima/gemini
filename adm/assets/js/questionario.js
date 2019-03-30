//alterar campo correta
$("#containerQuestoes").delegate(".botaoCorreta", "click", function(){
  $("#botaoSalvar").text("Salvando...");
  let botao = $(this);
  var idElemento = botao.parent().parent().find("input").attr("id"); 
  idElemento = idElemento.substring(1,);

  $.ajax({
    method: "POST",
    url: "alternativa_controller.php",
    data: { 
      id: idElemento,
      acao: "swapCorreta" 
    },
    success: (function(msg){
      console.log(msg);
      if (botao.hasClass("btn-warning")){
        botao.removeClass("btn-warning");
        botao.addClass("btn-success");
        botao.find("i").text("check");
      }else{
        botao.addClass("btn-warning");
        botao.removeClass("btn-success");
        botao.find("i").text("block");
      }
      $("#botaoSalvar").text("Salvo");
    })
  });
});

//alterar texto da questão
$("#containerQuestoes").delegate(".enunciado", "change", function(){
  $("#botaoSalvar").text("Salvando...");
  var idElemento = $(this).attr("id");
  $.ajax({
    method: "POST",
    url: "questao_controller.php",
    data: { 
      idQuestao: idElemento.substring(1,), 
      enunciado: $(this).val(), 
      acao: "edit" 
    },
    success: (function(msg){
      $("#botaoSalvar").text("Salvo");
    })
  });

});

//alterar texto da alternativa
$("#containerQuestoes").delegate(".campo-alternativa", "change", function(){
  $("#botaoSalvar").text("Salvando...");
  var idElemento = $(this).attr("id"); 
  $.ajax({
    method: "POST",
    url: "alternativa_controller.php",
    data: { 
      idAlternativa: idElemento.substring(1,), 
      texto: $(this).val(),
      acao: "edit" 
    },
    success: (function(msg){
      $("#botaoSalvar").text("Salvo");
    })
  });

});

//adicionar uma alternativa
$("#containerQuestoes").delegate(".adicionarAlternativa", "click", function(){
  $("#botaoSalvar").text("Salvando...");
  var idQuestao = $(this).closest(".item-enunciado").find(".enunciado").attr("id");
  idQuestao = idQuestao.substring(1,);
  var botao = $(this);
  botao.before(
    '<li class="item-alternativa">' + 
    '<div class="row">' + 
    '<div class="col-md-10">' + 
    '<input type="text" class="form-control campo-alternativa">' + 
    '</div>' +
    '<div class="col-md-2">' + 
    '<button class="btn btn-warning btn-fab btn-fab-mini btn-round botaoCorreta">' +
    '<i class="material-icons">block</i>' +
    '</button>' +
    '<button class="btn btn-danger btn-fab btn-fab-mini btn-round removerItem" tabindex=-1>' + 
    '<i class="material-icons">close</i>' + 
    '</button>' +  
    '</div>' +
    '</div>' +
    '</li>'
    );
  $.ajax({
    method: "POST",
    url: "alternativa_controller.php",
    data: { 
      idQuestao: idQuestao, 
      acao: "new" 
    },
    success: (function(msg){
      botao.parent().find("input").last().attr("id", "a" + msg);
      $("#botaoSalvar").text("Salvo");
    })
  });
});

//adicionar uma nova questão
$("#adicionarQuestao").click(function(){
  $("#botaoSalvar").text("Salvando...");
  $("#containerQuestoes").append(
    '<li class="item-enunciado">' + 
    '<div class="row">' + 
    '<div class="col-md-10">' + 
    '<input type="text" class="form-control enunciado">'+
    '<ol class="containerAlternativas">' + 
    '<button class="btn btn-primary btn-fab btn-fab-mini btn-round adicionarAlternativa">' + 
    '<i class="material-icons">add</i>' + 
    '</button>' + 
    '</ol>' + 
    '</div>' +
    '<div class="col-md-2">' + 
    '<button class="btn btn-danger btn-fab btn-fab-mini btn-round removerItem">' + 
    '<i class="material-icons">close</i>' + 
    '</button>' +  
    '</div>' +
    '</div>' +
    '</li>'
    );
  $.ajax({
    method: "POST",
    url: "questao_controller.php",
    data: { 
      idFase: <?= $idFase ?>, 
      acao: "new" 
    },
    success: (function(msg){
     $("#containerQuestoes li").last().find("input").attr("id", "q" + msg) ;
     $("#botaoSalvar").text("Salvo");
   })
  });
});

//remover item (questao ou alternativa)
$("#containerQuestoes").delegate(".removerItem", "click", function(){
  $("#botaoSalvar").text("Salvando...");
  var idElemento = $(this).closest("li").find("input").attr("id"); 
  var prefixo = idElemento.substring(0,1);
  idElemento = idElemento.substring(1,);
  var url = "";
  if (prefixo=="q") url = "questao_controller.php";
  else url = "alternativa_controller.php";
  $.ajax({
    method: "POST",
    url: url,
    data: { 
      id: idElemento,
      acao: "del" 
    },
    success: (function(msg){
      $("#botaoSalvar").text("Salvo");
    })
  });
  $(this).closest("li").remove();
});

