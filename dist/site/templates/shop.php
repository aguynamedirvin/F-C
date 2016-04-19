<?php snippet('header') ?>

	<!-- Slider -->
	<div class="slider  featured-slider">
		<div class="slide" style="background-image: url(https://images.unsplash.com/photo-1447798907885-abee8c7cfaca?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&w=1080&fit=max&s=2d282d1f7e41a32cbd6aeeb0e8a3f182)">
			<div class="slide-content">
				<h2 class="slide__title">Shop new styles</h2>
				<a class="btn btn--light" href="shop.html">Shop now</a>
			</div>
		</div>
		<div class="slide" style="background-image: url(https://images.unsplash.com/37/lynDyjGSR9eR57ouPIEE_IMG_woods.jpg?crop=entropy&dpr=2&fit=crop&fm=jpg&h=775&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1375)">
			<div class="slide-content">
				<h2 class="slide__title">Shop new styles</h2>
				<p class="slide__subtitle">Shop from thousands of new styles</p>
				<a class="btn btn--light" href="shop.html">Shop now</a>
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
