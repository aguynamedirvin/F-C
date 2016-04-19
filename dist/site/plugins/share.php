<?php

function socialIcons($page) {

    // Get current page url
    $url = rawurlencode($page->url());

    // Get current page tittle
    $title = rawurlencode($page->title());

    $thumbnail = $page->title('en');

    // Construct sharing urls
    $facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
    $twitterURL   = 'https://twitter.com/intent/tweet?source=webclient&text=' . $title . '%20' . $url;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $thumbnail . '&amp;description=' . $title;
    $googleURL    = 'https://plus.google.com/share?url=' . $url;

    // Build icons
    $icons  = '<ul class="social-icons">';
    $icons .= '<li><a href="' . $facebookURL . '" target="blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>';
    $icons .= '<li><a href="' . $twitterURL . '" target="blank" title="Tweet this"><i class="fa fa-twitter"></i></a></li>';
    $icons .= '<li><a href="' . $pinterestURL . '" target="blank"><i class="fa fa-pinterest"></i></a></li>';
    $icons .= '<li><a href="' . $googleURL . '" target="blank" title="Share this on Google+"><i class="fa fa-google-plus"></i></a></li>';
    $icons .= '</ul>';

    echo $icons;

}

?>
