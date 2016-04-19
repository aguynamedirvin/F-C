<!-- Site navigation -->
<nav id="site-nav">
    <ul>
        <li><a href="<?= page('shop')->url() ?>">Homepage</a></li>
        <li><a href="<?= page('shop/men')->url() ?>"><?= page('shop/men')->title()->html() ?></a></li>
        <li><a href="<?= page('shop/women')->url() ?>"><?= page('shop/women')->title()->html() ?></a></li>
    </ul>
</nav>
