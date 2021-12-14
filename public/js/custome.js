$(document).ready(function() {
    $(document).scroll(function () {
        var scroll = $(this).scrollTop();
        var topDist = $(".navbar-sec").position();
        if (scroll > topDist.top) {
            $('.navbar-sec').addClass("fixed-nav");
        } else {
            $('.navbar-sec').removeClass("fixed-nav")
        }
    });
});