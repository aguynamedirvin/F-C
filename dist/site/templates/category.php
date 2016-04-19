<?php snippet('header') ?>

	<!-- Display categories -->
	<?php if ($categories->count()): ?>
		<div class="cat-nav">
			<div class="wrap">
				<ul class="nav">
					<?php foreach($categories as $category): ?>
					<li><a href="<?= $category->url() ?>"><?= $category->title()->html() ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	<?php endif ?>

    <main class="wrap">

    	<?= snippet('list.product', ['products' => $products]) ?>

    </main>

<?php snippet('footer') ?>
