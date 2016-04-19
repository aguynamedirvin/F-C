<?php snippet('header') ?>

	<main class="wrap">

		<h1><?= $page->title()->html() ?></h1>
		<?= snippet('subpages') ?>
		<?= $page->text()->kirbytext()->bidi() ?>
		<?=('list.related') ?>

	</main>

<?php snippet('footer') ?>
