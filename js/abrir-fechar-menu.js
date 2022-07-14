$('.navbar .abrir-menu').on('click', function(){
    if ($(document).width() >= 768) {
        $("#Sidenav").css('width', '20em');
    } else {
        $("#Sidenav").css('width', '15em');
    }
    $("#Sidenav").css('marginRight', 'unset');
});

$('.navbar .fechar-menu').on('click', function(){
    $("#Sidenav").css('width', '0');
    $("#Sidenav").css('marginRight', '-5em');
});

//Ativar menus
function ativarMenu (parteLink, conteudo) {
    if (window.location.href.indexOf(parteLink) > -1) {
        $('#Sidenav > ul > li > a:contains('+conteudo+')').addClass('menu-ativo');
        //$('#Sidenav > ul > li > a').css('fontWeight', '');
        menuOption = true;
    }
}

let menuOption = false;

ativarMenu("index", 'Home');

ativarMenu("institucional", 'Mall');

ativarMenu("pesquisar-loja", 'Lojas e Alimentação');
ativarMenu("loja", 'Lojas e Alimentação');

ativarMenu("novidades", 'Novidades');
ativarMenu("noticia", 'Novidades');

if (!menuOption) {
    $('#Sidenav > ul > li:nth-child(1) > a').addClass('menu-ativo');
}