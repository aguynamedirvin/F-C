// Test Product Quick View
$('.quick-view').on('click', function() {
    $('.product-card').show();
});

$('.product-card__close').on('click', function() {
    $('.product-card').hide();
});




/*
    Move the site-info to last on mobile
*/
var $site_info = $('.site-info'),
    $L = 868;

jQuery(document).ready(function($) {
    // move #site-navigation inside header on laptop
    // insert #site-navigation after header on mobile
    move_credit( $site_info, $L);
    
    $(window).on('resize', function(){
        move_credit( $site_info, $L);
    });
});

function move_credit( $site_info, $MQ) {

    if ( $(window).width() >= $MQ ) {
        $site_info.detach();
        $site_info.insertBefore('.site-footer .site-footer__links');
    } else {
        $site_info.detach();
        $site_info.insertAfter('.site-footer .site-footer__social');
    }

}