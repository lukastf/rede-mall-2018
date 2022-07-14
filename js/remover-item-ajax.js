function removerItem () {
    $('.remover-item .remover-item-botao').on('click',function(event) {
        event.preventDefault();

        $form = $(this).parent().serialize();

        console.log($form);

        $.post("../database/remover-item.php", $form)
        .done(function () {

            let selecionarImagem = $form.split("=");
            console.log(selecionarImagem);
            let selecionarTituloouNome = selecionarImagem[1].split("&");
            console.log(selecionarTituloouNome);

            $('li[data-target="#modal'+selecionarTituloouNome[0]+'"]').remove();

        }).fail(function() {
        });
    });
}

removerItem();