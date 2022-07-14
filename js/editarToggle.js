$('.toggleEditar').on('click', function(event) {
    event.preventDefault();
    $toggleLabelDia = $(this).parent().find('.toggleLabelDia');
    $p = $(this).parent().find('p').text();
    $input = $(this).parent().find('input');
    $img = $(this).parent().parent().find('img');
    $video = $(this).parent().parent().find('.embed-responsive');

    $input.toggle();
    $toggleLabelDia.toggle();

    $(this).toggleClass('btn-info');
    $(this).toggleClass('btn-danger');

    if($(this).hasClass('editarVideo')) {
        $(this).text(function(i, text){
            return text === "Editar video" ? "Cancelar" : "Editar video";
        });
        $video.toggle();
        //$input.val('');
    }

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
    }
});