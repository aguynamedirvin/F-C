<?= snippet('header') ?>

    <main class="wrap">

        <?php if ($cart->count() === 0): ?>
            <div class="cart__empty">
                <h1>Your cart is empty :(</h1>
                <a class="btn btn--accent" href="<?= url('shop/shop') ?>">Shop now</a>
            </div>
        <?php else: ?>
            <div class="cart__bag">

                <h2 class="cart__heading"><?= $page->title()->html() ?></h2>

                <ul class="cart__items">
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
                                        <?= $item->name ?>
                                    </a>
                                </h3>
                                <span>Qty. <?= $item->quantity ?></span>
                                <!--<span>Size: Medium</span>-->
                                <span class="remove-button">
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="id" value="<?= $item->id ?>">
                                        <button class="cart__item-remove" type="submit">
                                            <?= e($item->quantity === 1, 'Remove', '&#9660;') ?>
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


                <div class="cart__options">
                    <?php $discountAmount = $cart->getDiscountAmount() ? $cart->getDiscountAmount() : 0 ?>
                    <?php if ($pages->find('shop')->discount_codes()->toStructure()->count() > 0): ?>
                        <?php if ( !$discountAmount > 0 ): ?>
                            <form class="col--12" method="post">
                                <input class="code" type="text" name="dc" placeholder="<?= l::get('discount') ?>" />
                                <button class="btn  apply" type="submit"><?= l::get('discount-apply') ?></button>
                            </form>
                        <?php endif ?>
                    <?php endif ?>

                    <!-- Set country -->
                    <form class="col--6  right" id="setCountry" action="" method="POST">
                        <select name="country" onChange="document.forms['setCountry'].submit();">
                            <?php foreach ($countries as $c): ?>
                                <option <?= ecco(s::get('country') === $c->uid(), 'selected') ?> value="<?= $c->countrycode() ?>">
                                    <?= $c->title() ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <button class="btn" type="submit"><?= l::get('update-country') ?></button>
                    </form>

                    <!-- Set shipping -->
                    <form class="col--6  left" id="setShipping" action="" method="POST">
                        <select name="shipping" onChange="document.forms['setShipping'].submit();">
                            <?php if (count($shipping_rates) > 0): ?>
                                <?php foreach ($shipping_rates as $rate): ?>
                                    <option value="<?= str::slug($rate['title']) ?>" <?php e($shipping['title'] === $rate['title'],'selected') ?>>
                                        <?= $rate['title'] ?> (<?php echo formatPrice($rate['rate']) ?>)
                                    </option>
                                <?php endforeach ?>
                            <?php else: ?>
                                <!-- If no shipping rates are set, show free shipping -->
                                <option value="free-shipping"><?= l::get('free-shipping') ?></option>
                            <?php endif ?>
                        </select>
                        <button class="btn" type="submit"><?= l::get('update-shipping') ?></button>
                    </form>
                </div>


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
                        <span class="cost">
                            <?= e($shipping['rate'] === 0, 'FREE', formatPrice($shipping['rate'])) ?>
                        </span>
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

                <!-- Paypal form -->
                <form method="post" action="<?php echo url('shop/cart/process') ?>">

                    <?php if (page('shop')->paypal_action() != 'live'): ?>
                        <div class="message  message--warning">
                            <?= l::get('sandbox-message') ?>
                        </div>
                    <?php endif ?>

                    <input type="hidden" name="gateway" value="paypal">

                    <div class="forRobots hide">
                      <label for="subject"><?= l::get('honeypot-label') ?></label>
                      <input type="text" name="subject">
                    </div>

                    <button class="btn  btn--accent" type="submit">Pay with PayPal</button>
                </form>

            </div><!-- /. cart summary -->
        <?php endif ?>

        <script type="text/javascript">
            // Remove setCountry and setShipping submit buttons
            document.querySelector('#setCountry button').style.display = 'none';
            document.querySelector('#setShipping button').style.display = 'none';
        </script>

    </main>

<?= snippet('footer') ?>
