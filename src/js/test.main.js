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


/** Set the size for horizontal scroll menu **/
$(document).ready(function() {

    var container_width, link_width;

    count = 0;
    container_width = 0;

    $('.nav a').each(function(index) {

      count++;
      link_width = parseInt($(this).width(), 10);

      container_width += parseInt($(this).width(), 10);

      console.log('Link ' + count + ' is ' + link_width + ' wide.');
    });

    console.log('The total width is: ' + container_width);

    $(".cat-nav ul").css("width", container_width - 100);


});