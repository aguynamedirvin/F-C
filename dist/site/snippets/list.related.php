<!-- Related products -->

<?php
	$index = $pages->index();
	$products = [];
	foreach ($page->relatedproducts()->toStructure() as $slug) {
		$product = $index->findByURI($slug->product());
		if($product->isVisible()) {
			$products[] = $product;
		}
	}
?>


<?php if (count($products)): ?>

    <section class="section">

        <h2 class="section__title"><?php echo l::get('related-products') ?></h2>

        <?php snippet('list.product', ['products' => $products]) ?>

    </section><!-- / .related products -->

<?php endif ?>
