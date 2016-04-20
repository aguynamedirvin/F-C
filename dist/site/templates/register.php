<?= snippet('header') ?>

    <main class="wrap">

        <div class="register-box">

            <h1 dir="auto"><?= $page->title()->html() ?></h1>

            <?= $page->text()->kirbytext()->bidi() ?>

            <?php if($register_message): ?>
            <div class="message message--error">
                <?= $register_message ?>
            </div>
            <?php endif ?>

            <form dir="auto" method="post">
                <div class="forRobots hide">
                    <label for="subject"><?= l::get('honeypot-label') ?></label>
                    <input type="text" name="subject">
                </div>
                <div>
                    <label class="hide" for="fullname"><?= l::get('full-name') ?></label>
                    <input type="text" id="fullname" name="fullname" value="<?= get('fullname') ?>" placeholder="<?= l::get('full-name') ?>">
                </div>
                <div>
                    <label class="hide" for="username"><?= l::get('username') ?></label>
                    <input type="text" id="username" name="username" placeholder="<?= l::get('username') ?>">
                </div>
                <div>
                    <label class="hide" for="email"><?= l::get('email-address') ?></label>
                    <input type="text" id="email" name="email" placeholder="<?= l::get('email-address') ?>">
                </div>
                <div>
                    <label class="hide" for="country"><?= l::get('country') ?></label>
                    <select name="country" id="country">
                        <option value="" disabled selected>Country</option>
                        <?php foreach ($countries as $c): ?>
                        <option value="<?= $c->slug() ?>"><?= $c->title() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button class="btn" type="submit" name="register"><?= l::get('register') ?></button>
            </form>

        </div>

    </main>

<?= snippet('footer') ?>
