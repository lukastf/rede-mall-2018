function adicionarItem(categoria, id_imagem, tabela) {
    $('.adicionar-'+categoria+' button:last-child').on('click',function(event) {
        event.preventDefault();
        $.ajax({
            url: "../database/adicionar-"+categoria+".php",
            type: 'POST',
            data: new FormData($('.adicionar-'+categoria+'')[0]),
            //TEM QUE INCLUIR!!!!!
            cache: false,
            contentType: false,
            processData: false,
            // Custom XMLHttpRequest
            xhr: function() {
                let myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    // For handling the progress of the upload
                    myXhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            $('progress').attr({
                                value: e.loaded,
                                max: e.total,
                            });
                        }
                    } , false);
                }
                return myXhr;
            }
        }).done(function() {
            window.location.reload();
        }).fail(function() {

        }).always(function() {

        });
    });
}

adicionarItem('publicidade', '#imagemPublicidade', 'publicidades');
adicionarItem('banner', '#imagemBanner', 'banner');
adicionarItem('noticia', '#imagemNoticia', 'noticias');
adicionarItem('loja', '#imagemLoja', 'lojas');