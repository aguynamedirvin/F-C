<?= snippet('header') ?>

    <main class="wrap">

        <div class="cart__bag">
            <h2 class="cart__heading"><?= $page->title()->html() ?></h2>

            <ul>
                <?php foreach($items as $i => $item): ?>
                    <li class="cart__item">
                        <span class="cart__item-thumb">
                            <a href="<?= url($item->uri) ?>" title="<?= $item->fullTitle() ?>">
                                <?php if ($item->imgSrc): ?>
                                    <img src="<?= $item->imgSrc ?>" title="<?= $item->name ?>">
                                <?php endif ?>
                            </a>
                        </span>

                        <span class="cart__item-details">
                            <h3>
                                <a href="<?= url($item->uri) ?>" title="<?= $item->fullTitle() ?>">
                                    <?php echo $item->name ?>
                                </a>
                            </h3>
                            <span>Qty. <?= $item->quantity ?></span>
                            <span>Size: Medium</span>
                            <span>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                    <button class="cart__item-remove" type="submit">
                                        <?php
                                            if ($item->quantity === 1) {
                                                echo 'Remove'; // x (delete)
                                            } else {
                                                echo '&#9660;'; // Down arrow
                                            }
                                        ?>
                                    </button>
                                </form>
                            </span>
                        </span>

                        <span class="cart__item-pricing">
                            <span class="price"><?= $item->priceText ?></span>
                        </span>
                    </li>
                <?php endforeach ?>
            </ul>

            <?php $discountAmount = $cart->getDiscountAmount() ? $cart->getDiscountAmount() : 0 ?>
            <?php if ($pages->find('shop')->discount_codes()->toStructure()->count() > 0): ?>
                <?php if ( !$discountAmount > 0 ): ?>
                    <form method="post">
                        <input type="text" name="dc" placeholder="<?= l::get('discount') ?>" />
                        <button type="submit">
                            <?= l::get('discount-apply') ?>
                        </button>
                    </form>
                <?php endif ?>
            <?php endif ?>

        </div><!-- /. cart-bag -->


        <div class="cart__summary">
            <h2 class="cart__heading">Order summary</h2>

            <ul class="cart__summary-details">
                <li>
                    <span class="of"><?= l::get('subtotal') ?></span>
                    <span class="cost"><?= formatPrice($cart->getAmount()) ?></span>
                </li>
                <li>
                    <span class="of"><?= l::get('shipping') ?></span>
                    <span class="cost">$10</span>
                </li>
                <li>
                    <span class="of"><?= l::get('tax') ?></span>
                    <span class="cost">
                        <?php $tax = number_format($cart->getTax(), 2, '.', '') ?>
                        <?= formatPrice($tax) ?>
                    </span>
                </li>

                <?php if ($discountAmount > 0): ?>
                <li>
                    <span class="of"><?= l::get('discount') ?></span>
                    <span class="cost"><?= '&ndash; ' . formatPrice($discountAmount) ?></span>
                </li>
                <?php endif ?>
                
            </ul>

            <div class="cart__subtotal">
                <div class="subtotal__title"><?= l::get('total') ?></div>
                <div class="subtotal__cost">
                    <?= formatPrice($cart->getAmount() + $tax + $shipping['rate'] - $discountAmount) ?>
                </div>
            </div>

            <button class="btn btn--accent">Checkout</button>

        </div><!-- /. cart summary -->

    </main>

<?= snippet('footer') ?>
