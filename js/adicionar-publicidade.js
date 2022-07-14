$('.toggleEditarVideo').on('click', function(event) {
    event.preventDefault();

    $(this).text(function(i, text){
        return text === "Video" ? "Imagem" : "Video";
    });

    $('.adicionar-publicidade .imagem-publici').toggle();
    $('.adicionar-publicidade .video-publici').toggle();

    $('.adicionar-publicidade .imagem-publici input').val('');
    $('.adicionar-publicidade .video-publici input').val('');
    
    //$('.adicionar-publicidade #mobile_ou_desktop').val('0').prop('disabled', function(i, v) { return !v; });
    //$('.adicionar-publicidade #lugar').val('0').prop('disabled', function(i, v) { return !v; });

    //if((this).text() )

    /*
    $toggleLabelDia = $(this).parent().find('.toggleLabelDia');
    $p = $(this).parent().find('p').text();
    $input = $(this).parent().find('input');
    $img = $(this).parent().parent().find('img');

    $input.toggle();
    $toggleLabelDia.toggle();

    $(this).toggleClass('btn-info');
    $(this).toggleClass('btn-danger');

    if($(this).hasClass('editarImagem')) {
        $(this).text(function(i, text){
            return text === "Editar imagem" ? "Cancelar" : "Editar imagem";
        });
        $img.toggle();
        $input.val('');
    }

    if ($(this).hasClass('editarData')) {
        $(this).text(function(i, text){
            return text === "Editar data" ? "Cancelar" : "Editar data";
        });
        $input.val($p);
    }*/
});