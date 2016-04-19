<?php if ($categories->count()): ?>
	<?php foreach($categories as $category): ?>
		<?php
			if ($category->hasImages()) {
				$image = $category->images()->sortBy('sort', 'asc')->first();
			} else {
				$image = $site->images()->find($site->placeholder());
			}
			$thumb = thumb($image, array('height' => 600, 'quality' => 100, 'upscale' => true));
		?>
		<div class="shop" style="background-image: url(<?php echo $thumb->url() ?>)">
            <a class="btn" href="<?php echo $category->url() ?>">Shop <?php echo $category->title()->html() ?></a>
        </div>
	<?php endforeach ?>
<?php endif ?>
