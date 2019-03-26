$(document).ready(function () {
    $('.slide-show').slick({
        dots: false,
        speed: 300,
        slidesToShow: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });
});