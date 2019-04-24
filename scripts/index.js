$(document).ready(function () {
    // Smooth scrolling for learn more button
    $("#learn-more").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
    });
});