<?php if (count($products) or $products->count()): ?>
    <ul class="product__list">

        <?php foreach($products as $product): ?>

            <li class="product-item">
                <div class="product-item__preview">
                    <a href="<?php echo $product->url() ?>" vocab="http://schema.org" typeof="Product">

                        <?php
        					if ($product->hasImages()) {
        						$image = $product->images()->sortBy('sort', 'asc')->first();
        					} else {
        						$image = $site->images()->find($site->placeholder());
        					}
        					$thumb = thumb($image, array('height' =>350, 'width' => 300, 'crop' => true, 'quality' => 100));
        				?>
        				<img property="image" content="<?php echo $thumb->url() ?>" src="<?php echo $thumb->dataUri() ?>" title="<?php echo $product->title() ?>">
                    </a>
                </div>
                <div class="product-item__desc">
                    <h3 class="product-item__title" property="name">
                        <a href="<?php echo $product->url() ?>" vocab="http://schema.org" typeof="Product"><?php echo $product->title() ?></a>
                    </h3>

                    <?php
		    			$count = $minPrice = $minSalePrice = 0;
		    			foreach ($product->variants()->toStructure() as $variant) {
		    				// Assign the first price
		    				if (!$count) {
		    					$minVariant = $variant;
		    					$minPrice = $variant->price()->value;
		    					$minSalePrice = salePrice($variant);
		    				} else if ($variant->price()->value < $minPrice){
		    					$minVariant = $variant;
		    					$minPrice = $variant->price()->value;
		    					$minSalePrice = salePrice($variant);
		    				}
		    				$count++;
		    			}
					?>

                    <div class="price  product-item__price">
    					<?php
    						if ($minSalePrice) {
    							$priceFormatted = '<ins class="price--sale">' . formatPrice($minSalePrice) . '</ins>';
    							$priceFormatted .= ' <del class="price--crossed">' . formatPrice($minPrice) . '</del>';
    						} else {
    							$priceFormatted = formatPrice($minPrice);
    						}
    						if ($count) $priceFormatted = $priceFormatted;
    						echo $priceFormatted;
    					?>
                    </div>

                </div>
            </li>

        <?php endforeach ?>

    </ul>
<?php endif ?>
