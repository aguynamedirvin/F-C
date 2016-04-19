		<!-- Newsletter -->
		<section class="section  news-letter">
		    <div class="news-letter__form">
		        <h2 class="section__title">Send me exclusive offers</h2>
		        <form>
		            <input type="text" placeholder="Your email">
		            <input class="btn  btn--accent" type="submit" value="Sign me up!">
		        </form>
		    </div>
		</section>



		<!-- Footer -->
		<footer class="site-footer">
		    <div class="wrap">

		        <div class="site-info">
		            <div class="logo"><?= $site->title()->html() ?></div>

		            <div class="site-note">&copy; <?= date('Y') ?>. All rights reserved. Crafted with <span class="heart"></span> by <a href="http://squarepixl.com/">SquarePixl.</a></div>
		        </div>

		        <div class="site-footer__widget  site-footer__links">
		            <h4>Links</h4>

		            <ul>
		                <?php

		                    $links = $site->footer_links()->split();
		                    $index = $site->index();

		                    foreach ($links as $link) {
		                        $link = $index->findByURI($link);

		                        echo '<li><a href="' . $link->url() . '">' . $link->title() . '</a></li>';
		                    }

		                ?>
		            </ul>
		        </div>

		        <div class="site-footer__widget  site-footer__social">
		            <h4>Follow Us</h4>
		            <ul class="social-icons">

		                <?php

		                    $facebook = page('contact')->facebook();
		                    $twitter = page('contact')->twitter();
		                    $instagram = page('contact')->instagram();
		                    $googleplus = page('contact')->google_plus();

		                ?>

		                <!-- Facebook -->
		                <?= ecco( $facebook->isNotEmpty(), '<li><a href="' . $facebook->toURL() . '"><i class="fa fa-facebook"></i></a></li>'); ?>

		                <!-- Twitter -->
		                <?= ecco( $twitter->isNotEmpty(), '<li><a href="' . $twitter->toURL() . '"><i class="fa fa-twitter"></i></a></li>'); ?>

		                <!-- Instagram -->
		                <?= ecco( $instagram->isNotEmpty(), '<li><a href="' . $instagram->toURL() . '"><i class="fa fa-instagram"></i></a></li>'); ?>

		                <!-- Google Plus -->
		                <?= ecco( $googleplus->isNotEmpty(), '<li><a href="' . $googleplus->toURL() . '"><i class="fa fa-google-plus"></i></a></li>'); ?>

		            </ul>
		        </div>

		    </div>
		</footer>


		<!-- JavaScript -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
		<?php echo js('assets/js/vendor/jquery-2.2.0.min.js') ?>
		<?php echo js('assets/js/main.min.js') ?>
		<?php echo js('assets/js/mobile.min.js') ?>


		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
		    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		    e.src='https://www.google-analytics.com/analytics.js';
		    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
		</script>

	</body>
</html>
