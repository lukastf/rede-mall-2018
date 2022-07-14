$(function () {
    $(".item").slice(0, 3).show();
    $(".item").parent().slice(0, 1).show();

    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".item:hidden").slice(0, 3).slideDown();
        $(".item:hidden").parent().slice(0, 1).slideDown();

        if ($(".item:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top - 650
        }, 1500);
    });
});

$('a[href="#top"]').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 600);
    return false;
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.totop a').fadeIn();
    } else {
        $('.totop a').fadeOut();
    }
});