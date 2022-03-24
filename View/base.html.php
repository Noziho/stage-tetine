<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nassima tétine</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link
            rel="stylesheet"
            href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
</head>
<body>
<header>

    <div>
        <a href="/?c=home"><img id="logo" src="/assets/img/logo/first-image1.png" alt=""></a>
    </div>

    <div id="logout">
        <a href="/?c=product">Nos produits</a><?php
            if (!isset($_SESSION['user'])) {?>
                <span><a href="/?c=user&a=login">Login</a>/<a href="/?c=user">Inscription</a></span><?php
            }
            else {?>
                 <a href="/?c=user&a=disconnect">Déconnexion</a><?php
            }
        ?>

    </div>

</header>

<main><?= $html ?></main>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="/assets/js/Carousel.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>