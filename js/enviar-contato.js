$('.contato button').on('click',(event) => {
    event.preventDefault();
    $('.contato button').prop("disabled",true);
    $('.falhou p').css('color', 'black');
    
    $.ajaxSetup({
        //timeout: 10000,
        beforeSend: function() {
            $('.contato .fa-circle-o-notch').css('display', 'inline-block');
        },
        complete: function(){
            $('.contato .fa-circle-o-notch').css('display', 'none');
        },
        statusCode: {
            500: function (response) {
                //alert('1');
                $('.falhou p').text("Campo vazio");
             },
             501: function (response) {
                //alert('1');
                $('.falhou p').text("Email invalido");
             },
             502: function (response) {
                 $('.falhou p').text("Telefone invalido");
             }
        }
    });

    $.post("/novo-contato.php", $( ".validar-contato" ).serialize())
    .done(() => {
        //location.reload();
        $('.validar-contato')[0].reset();
        $('.falhou p').text("Mensagem enviada com sucesso");
        $('.falhou p').css('color', 'green');
        $('.falhou').show();
        $('.contato button').prop("disabled",false);
        // setTimeout(() => {
        //     $('#overlay').fadeOut();
        // }, 2000);
    }).fail(() => {
        $('.falhou').show();
        $('.contato button').prop("disabled",false);
    });
});