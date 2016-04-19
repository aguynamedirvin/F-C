<?php snippet('header') ?>

    <main class="wrap">

        <!-- Product -->
        <div class="product">

            <!-- Product image slider -->
            <?php if ($page->hasImages()) snippet('product.slider', ['photos'=>$page->images()]) ?>

            <div class="product__details">

                <h1 class="product__title"><?php echo $page->title()->html() ?></h1>

                <?php if (count($variants)): ?>
                    <?php foreach ($variants as $variant): ?>

                    <div class="product__price">
                        <?php
                            if ($saleprice = salePrice($variant)) {
                                echo '<ins class="price--sale">' . formatPrice($saleprice) . '</ins> ';
                                echo '<del class="price--crossed">' . formatPrice($variant->price()->value) . '</del>';
                            } else {
                                echo formatPrice($variant->price()->value);
                            }
                        ?>
                    </div>

                    <div class="product__options">
                        <form method="post" action="<?php echo url('shop/cart') ?>">

                            <!-- Hidden fields -->
			            	<input type="hidden" name="action" value="add">
			            	<input type="hidden" name="uri" value="<?php echo $page->uri() ?>">
			            	<input type="hidden" name="variant" value="<?php echo str::slug($variant->name()) ?>">

                            <div class="product__select  product__select-size">

                                <?php $options = str::split($variant->options()) ?>
                                <?php if (count($options)): ?>
                                    <select id="size" name="option">
                                        <option value="hide">Select size</option>
                                        <?php foreach ($options as $option) { ?>
                                            <option value="<?php echo str::slug($option) ?>"><?php echo str::ucfirst($option) ?></option>
                                        <?php } ?>
                                    </select>
                                <?php endif ?>

                            </div>

                            <?php if (inStock($variant)): ?>
                                <button class="btn btn--accent" type="submit" property="offers" typeof="Offer">
                                    <?php echo l::get('buy') ?>
                                    <link property="availability" href="http://schema.org/InStock" />
                                </button>
                            <?php else: ?>
                                <button class="btn btn--accent" type="submit" property="offers" typeof="Offer">
                                    <?php echo l::get('out-of-stock') ?>
                                    <link property="availability" href="http://schema.org/OutOfStock" />
                                </button>
                            <?php endif ?>

                        </form>
                    </div>

                    <?php endforeach ?>
                <?php endif ?>

                <div class="product__info">
                    <h3>Details</h3>
                    <p><?php echo $page->text()->kirbytext() ?></p>

                    <h3>Let your friends know</h3>
                    <?php socialIcons($page) ?>
                </div>

            </div>
        </div>


        <!-- Similar Products -->
        <?php snippet('list.related') ?>

    </main>


<?php snippet('footer') ?>
