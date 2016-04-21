<?php snippet('header') ?>

	<!-- Slider -->
	<div class="slider  featured-slider">
		<div class="slide" style="background-image: url(<?= $site->url() . '/assets/images/slider/nick_sarah.jpg' ?>">
			<div class="slide-content">
				<a class="btn btn--light" href="<?= url('shop/men') ?>">Shop now</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(<?= $site->url() . '/assets/images/slider/obed.jpg' ?>">
			<div class="slide-content">
				<h2 class="slide__title">#fitandclassy</h2>
			</div>
		</div>
	</div>
	<!-- /Slider -->

	<main class="wrap">

		<section class="section">

            <h2 class="section__title">Latest Arrivals</h2>

			<?= snippet('list.product', ['products' => $products]) ?>

		</section>


		<!--<?= snippet('list.category', ['categories' => $categories]) ?>-->

	</main>

<?php snippet('footer') ?>
