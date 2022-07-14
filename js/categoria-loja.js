$('.categoria-loja').on('click', function(event){
    event.preventDefault();

    let indice = $(this).index();

    if (indice == 0) {
        LiveSearch();
        voltarNormal();
        $('#dropdownMenuButton').text('categorias');
        $('.pagination').css('display','');
    } else {
        LiveSearch();
        $('.item').parent().show();

        LiveSearch(indice);
        
        let textoCategoria = $(this).text();
        $('#dropdownMenuButton').text(textoCategoria);
        $('.pagination').css('display','none');
    }
});