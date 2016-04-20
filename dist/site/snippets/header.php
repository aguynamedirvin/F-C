<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="apple-touch-icon" href="<?= $site->url() ?>/apple-touch-icon.png">
		<link rel="shortcut icon" href="<?= $site->url() ?>/favicon.ico" type="image/x-icon" />

		<!-- Stylesheets -->
		<?= css('assets/css/main.css') ?>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    </head>

    <body>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



        <!-- Site Header -->
        <header class="site-header">

            <div class="wrap">

                <?= snippet('logo') ?>

                <a href="#0" id="hamburger-menu"><span></span></a>
                <a href="<?= e($user = $site->user(), url('shop/orders'), url('account/register'))  ?>" id="nav-user-icon" class="img-replace">Account</a>
                <a href="<?= url('shop/cart') ?>" id="nav-cart-trigger"></a>

            </div>

        </header>


        <?= snippet('header.nav') ?>
