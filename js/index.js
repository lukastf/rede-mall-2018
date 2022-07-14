$( document ).ready(function() {
    $('.navbar #collapsibleNavbar button').on('click', function(){
        $('button[class="navbar-toggler"]').trigger('click');
    });
    //$('#banner .carousel-indicators li:first-child').addClass('active');
    //$('#banner .carousel-inner .carousel-item:first-child').addClass('active');

    $('#enviarEmail .fecharEmail').on('click', function(){
        $('#overlay').fadeOut();
    });

    if ($(document).width() <= 768) {
        $('#bannerMobile .carousel-inner .carousel-item img').addClass('espaco-topo');
    }
});