$('#enviarEmail .enviarEmail').on('click',(event) => {
    event.preventDefault();
    $('#enviarEmail .enviarEmail').prop("disabled",true);
    $('.falhou p').css('color', 'black');
    
    $.ajaxSetup({
        //timeout: 10000,
        beforeSend: function() {
            $('#enviarEmail .fa-circle-o-notch').css('display', 'inline-block');
        },
        complete: function(){
            $('#enviarEmail .fa-circle-o-notch').css('display', 'none');
        },
        statusCode: {
            500: function (response) {
                //alert('1');
                $('.falhou p').text("Email Vazio, tente novamente");
             },
             501: function (response) {
                //alert('1');
                $('.falhou p').text("Email já está cadastrado");
             },
             502: function (response) {
                 $('.falhou p').text("Falta um @ ou .");
             }
        }
    });

    $.post("novo-email.php", $( ".validar-email" ).serialize())
    .done(() => {
        //location.reload();
        $('#enviarEmail .validar-email')[0].reset();
        $('.falhou p').text("Email cadastrado com sucesso");
        $('.falhou p').css('color', 'green');
        $('.falhou').show();
        $('#enviarEmail .enviarEmail').prop("disabled",false);
        setTimeout(() => {
            $('#overlay').fadeOut();
        }, 2000);
    }).fail(() => {
        $('.falhou').show();
        $('#enviarEmail .enviarEmail').prop("disabled",false);
    });
});