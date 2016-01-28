// Initialize Slick Sliders
$(document).ready(function(){

    // Homepage Slider
    $('.featured-slider').slick({
        arrows: false,
        dots: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
    });


    // Product Slider
    $('.product__slider').slick({
        arrows: false,
        dots: true,
        asNavFor: '.product__thumbnails'
    });
    $('.product__thumbnails').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product__slider',
        focusOnSelect: true,
        vertical: true,
        responsive: [
            {
                breakpoint: 868,
                settings: {
                    slidesToShow: 3,
                    vertical: false
                }
            }
        ]
    });
});