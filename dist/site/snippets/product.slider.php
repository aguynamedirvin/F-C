<?php
/**
 * Slider plugin
 * $photos expects a collection of images or a comma-delimited list of filenames, e.g. from a `checkboxes` field.
*/

// Convert comma-separated list of filenames to image objects
$filenames = $photos->split();
if (is_array($filenames)) {
	$photos = page()->images()->filter(function($image) use ($filenames) {
		return in_array($image->filename(),$filenames);
	});
}

?>

<div class="product__preview">

    <?php $first = true ?>
    <div class="slider  product__slider">
        <?php foreach ($photos as $photo): ?>
            <div class="product__slide">
                <img src="<?php echo thumb($photo, array('height'=> 600, 'width' => 550, 'crop' => true, 'upscale' => true))->url() ?>" title="<?php echo $photo->title() ?>"/>
            </div>
        <?php endforeach ?>
    </div>

    <?php if ($photos->count() > 1): ?>
        <div class="product__thumbnails">
            <?php foreach ($photos as $photo): ?>
                <div class="product__thumbnail">
                    <img src="<?php echo thumb($photo,array('width' => 100, 'height' => 150, 'quality' => 80, 'crop'=>true))->dataUri() ?>" title="<?php echo $photo->title() ?>"/>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

</div>
