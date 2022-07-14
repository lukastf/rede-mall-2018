
$( document ).ready(function() {
    $('.logout').on('click', function(event){
        event.preventDefault();
        $.post("/rede-mall/database/logout.php")
        .done(function(){
            location.reload();
        });
    });
});
