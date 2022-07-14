$( document ).ready(function() {
    $('.abrir-lista').on('click', function(){
        $(this).parent().parent().find('ul').toggle();

        let $icone =  $(this).find('i');

        $icone.toggleClass('fa-plus');
        $icone.toggleClass('fa-minus');
    });
});