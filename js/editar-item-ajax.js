function editarItem (categoria) {
    $('.editar-item-'+categoria+' .editar-item-botao').on('click',function(event) {
        event.preventDefault();

        $form = $(this).parent().parent()[0];

        //console.log($form);
        //console.log($(this).parent().parent().serialize());
        //console.log($(this).parent().parent()[0].serialize());

        $.ajax({
            url: "../database/editar-"+categoria+".php",
            type: 'POST',
            data: new FormData($form),
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
        }).done( function(){
            window.location.reload();
        }).fail( function(){

        }).always( function(){

        });
    });
}

editarItem('publicidade');
editarItem('banner');
editarItem('noticia');
editarItem('loja');