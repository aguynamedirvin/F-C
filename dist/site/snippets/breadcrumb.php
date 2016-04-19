<nav class="breadcrumb">
    <?php foreach($site->breadcrumb() as $crumb): ?>
	<li>
		<a href="<?= $crumb->url() ?>" title="<?= html($crumb->title()) ?>" <?= if($crumb->is($page)) 'class="current"' ?>>
			<?= html($crumb->title()) ?>
		</a>
	</li>
    <?php endforeach ?>
</nav>
