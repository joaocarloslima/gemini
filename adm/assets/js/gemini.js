gemini = {
// FUNÇÃO QUE EXIBE NOTIFICAÇÃO
// message = texto a ser exibido, pode conter HTML
// from = top ou bottom
// align = left, center ou right
// icon = nome do icone (https://material.io)
 showNotification: function(message, type='info', from='top', align='right', icon='add_alert') {

    $.notify({
      icon: icon,
      message: message

    }, {
      type: type,
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }

}