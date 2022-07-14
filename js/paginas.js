$(".item").slice(0, 6).show();
$(".item").parent().slice(0, 2).show();

$('.pagination > li:nth-child(2)').addClass('active');

$('.page-item').on('click', function(e){
    e.preventDefault();
    
    $valorClicado = $(this).text();
    $valorAtual = $('.pagination').find('.active').text();
    $valorAtual = parseInt($valorAtual);

    if($valorClicado == "Anterior") {
        if($valorAtual == 1) {
            return false;
        }
        else {
            $valorClicado = $valorAtual - 1;
        }
    }
    if($valorClicado == "Próximo") {
        if($valorAtual == $('.pagination > li:nth-last-child(2)').text()) {
            return false;
        }
        else {
            $valorClicado = $valorAtual + 1;
        }
    }

    $valorClicado = parseInt($valorClicado);


    $('.item').hide();
    $('.item').parent().hide();

    $('.pagination > li').removeClass('active');

    $valordoFilho = $valorClicado * 2;

    $('.lista-paginas > div:nth-child('+($valordoFilho - 1)+')').fadeIn('slow');
    $('.lista-paginas > div:nth-child('+($valordoFilho - 1)+') .item').fadeIn('slow');
    $('.lista-paginas > div:nth-child('+$valordoFilho+')').fadeIn('slow');
    $('.lista-paginas > div:nth-child('+$valordoFilho+') .item').fadeIn('slow');

    $('.pagination > li:nth-child('+($valorClicado + 1)+')').addClass('active');

    $('html,body').scrollTop(0);

});