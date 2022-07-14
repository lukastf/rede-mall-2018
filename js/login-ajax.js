$('.validar-login button').on('click',(event) => {
    event.preventDefault();
    $('.validar-login button').prop("disabled",true);

    $.ajaxSetup({
        timeout: 10000,
        statusCode: {
            500: function (response) {
                $('.falhou p').text("Login Incorreto, tente novamente");
            },
            501: function (response) {
                $('.falhou p').text("Aguarde 2 minutos para tentar denovo");
            }
        }
    });

    $.post("database/login.php", $( ".validar-login" ).serialize())
    .done(() => {
        location.reload();
    }).fail(() => {
        $('.falhou').show();
        $('.validar-login button').prop("disabled",false);
    });
});