CampoVazio = !$('#pesquisa-loja').val();

function LiveSearch ($this = -1) {
    let i = 1;
    let ctrl = 0;
    //let sumirComARow = 0;
    let atributo, searchTerm;

    if ($this == -1) {
        atributo = 'data-search-term';
        searchTerm = $('.live-search-box').val().toLowerCase();
        //itens = $('.live-search-list .row .item');
    } else {
        //itens = $('.live-search-list .row .item');
        atributo = 'categoria';
        searchTerm = $this;
    }

    // $('.live-search-list .row .item').each(function(){
    itens.each(function() {

        if ($(this).filter('['+ atributo +' *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
            
            $(this).show();
            //$(this).fadeIn('slow');

            let linhas = $('.live-search-list > div:nth-child('+i+')');

            //adiciona na primeira linha
            //linhas.prepend($(this));

            linhas.append($(this));

            ctrl++;

            if(ctrl >= 3) {
                i++;
                ctrl = 0;
                //sumirComARow = 0;
            }

            //$(this).parent().show();
            // if($(this).parent().children(':visible').length != 0) {
            //     //$(this).parent().show();
            //     console.log("haha");
            // }
            
        } else {
            $(this).hide();
            //$(this).parent().hide();

            // if($(this).parent().children(':visible').length == 0) {
            //     $(this).parent().hide();
            // }

            // sumirComARow++;
            
            // if (sumirComARow >= 6) {
            //     $(this).parent().hide();
            //     //sumirComARow++;
            //     sumirComARow = 0;
            // }
        }
    });

    itens.parent().each(function(){
        if($(this).children(':visible').length == 0) {
            $(this).hide();
        }
    });

    // if(itens.parent().children(':visible').length == 0) {
    //     $(this).parent().hide();
    // }
     
    // else if ($(this).parent().children(':visible').length != 0){
    //     $(this).parent().show();
    // }
}

function voltarNormal() {
    $valorAtual = $('.pagination').find('.active').text();
    $valorAtual = parseInt($valorAtual);
    $valorAtual*=2;

    $('.item').hide();
    $('.item').parent().hide();

    $('.lista-paginas > div:nth-child('+($valorAtual - 1)+')').show();
    $('.lista-paginas > div:nth-child('+($valorAtual - 1)+') .item').show();
    $('.lista-paginas > div:nth-child('+$valorAtual+')').show();
    $('.lista-paginas > div:nth-child('+$valorAtual+') .item').show();
}

$('.live-search-list .row .item').each(function(){
    $(this).attr('data-search-term', $(this).find('h3').text().toLowerCase());
    $(this).attr('categoria', $(this).find('.categoria').text());
});

let itens = $('.live-search-list .row .item');

let controlarUltimoBackspace = false;
let CaixaDeTexto = $('.live-search-box');

$('.live-search-box').on('keyup', function(event){
    if (event.which == 37 || event.which == 38 || event.which == 39 || event.which == 40) {
        return false;
    }
    if (!$('#pesquisa-loja').val() && controlarUltimoBackspace) {
        if (event.which == 8) {
            return false;
        }
        else {
            LiveSearch();
            controlarUltimoBackspace = false;
        }
    }
    else if (!$('#pesquisa-loja').val()) {
        LiveSearch();
        controlarUltimoBackspace = true;
        voltarNormal();
        $('.pagination').css('display','');
    }
    else {
        $('.item').parent().show();
        LiveSearch();
        controlarUltimoBackspace = false;
        $('.pagination').css('display','none');
    }
});


$('.live-search-button').on('click', function(event){
    event.preventDefault();
    if (!$('#pesquisa-loja').val() && controlarUltimoBackspace) {
        return false;
    }
    else if (!$('#pesquisa-loja').val()) {
        LiveSearch();
        controlarUltimoBackspace = true;
        voltarNormal();
        $('.pagination').css('display','');
    }
    else {
        $('.item').parent().show();
        LiveSearch();
        controlarUltimoBackspace = false;
        $('.pagination').css('display','none');
    }
});

$('.live-search-button').trigger('click');