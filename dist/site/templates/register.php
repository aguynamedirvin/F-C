<?= snippet('header') ?>

    <main class="wrap">

        <div class="login-box  login-box--left">

            <h1><?= $page->title()->html() ?></h1>

            <?php if($register_message): ?>
            <div class="message message--error">
                <?= $register_message ?>
            </div>
            <?php endif ?>

            <form dir="auto" method="post" action="">
                <div class="forRobots hide">
                    <label for="subject"><?= l::get('honeypot-label') ?></label>
                    <input type="text" name="subject">
                </div>

                <label class="hide" for="fullname"><?= l::get('full-name') ?></label>
                <input type="text" id="fullname" name="fullname" value="<?= get('fullname') ?>" placeholder="<?= l::get('full-name') ?>">

                <label class="hide" for="username"><?= l::get('username') ?></label>
                <input type="text" id="username" name="username" placeholder="<?= l::get('username') ?>">

                <label class="hide" for="email"><?= l::get('email-address') ?></label>
                <input type="text" id="email" name="email" placeholder="<?= l::get('email-address') ?>">

                <label class="hide" for="country"><?= l::get('country') ?></label>
                <select name="country" id="country">
                    <option value="" disabled selected>Country</option>
                    <?php foreach ($countries as $c): ?>
                    <option value="<?= $c->slug() ?>"><?= $c->title() ?></option>
                    <?php endforeach ?>
                </select>

                <button class="btn  btn--accent" type="submit" name="register"><?= l::get('register') ?></button>
            </form>

        </div>

        <div class="login-box  login-box--right">

            <h1>Login</h1>

            <?php if (get('login') === 'failed'): ?>
                <div class="message  message--error">
                    <?= l::get('notification-login-failed') ?>
                </div>
            <?php endif ?>

            <form dir="auto" action="<?= url('/login') ?>" method="POST" id="login">

                <label for="email"><? l::get('email-address') ?></label>
                <input type="text" id="email" name="email" placeholder="<? l::get('email-address') ?>">

                <label class="hide" for="password"><?= l::get('password') ?></label>
                <input type="password" id="password" name="password" placeholder="<?= l::get('password') ?>">

                <button class="btn  btn--accent" type="submit" name="login">
                    <?= l::get('login') ?>
                </button>

                <a href="<?= url('account/reset') ?>" title="<?= l::get('forgot-password') ?>"><?= l::get('forgot-password') ?></a>
            </form>

            <script>
                // domready (c) Dustin Diaz 2014 - License MIT
                !function(e,t){typeof module!="undefined"?module.exports=t():typeof define=="function"&&typeof define.amd=="object"?define(t):this[e]=t()}("domready",function(){var e=[],t,n=document,r=n.documentElement.doScroll,i="DOMContentLoaded",s=(r?/^loaded|^c/:/^loaded|^i|^c/).test(n.readyState);return s||n.addEventListener(i,t=function(){n.removeEventListener(i,t),s=1;while(t=e.shift())t()}),function(t){s?setTimeout(t,0):e.push(t)}})

                // Add click handlers to the links to make the login form flash
                domready(function() {
                    function flashForm(event) {
                        var form = document.getElementById('login');
                        form.scrollIntoView(true);
                        form.style.opacity = 0;
                        setTimeout(function(){ form.style.opacity = 1; }, 300);
                    }
                    var links = document.querySelectorAll('a[href="#user"]');
                    for (var i = 0; i < links.length; i++) {
                        links[i].addEventListener("mouseup", flashForm, true);
                    }
                });
            </script>
        </div>

    </main>

<?= snippet('footer') ?>
