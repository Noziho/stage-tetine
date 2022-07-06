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
        <div>
            <i class="fas fa-bars" id="burger"></i>
        </div>

        <a class="responsive-menu" href="/?c=product">Nos produits</a><?php

        use Model\Entity\User;

        if (!isset($_SESSION['user'])) {?>
                <span class="responsive-menu"><a href="/?c=user&a=login">Login</a>/<a href="/?c=user">Inscription</a></span><?php
            }
            else {
                $user = $_SESSION['user'];
                /* @var User $user */ ?>
                <a href="/?c=basket">Panier</a>
                <a class="responsive-menu" href="/?c=user&a=show-user&id=<?= $user->getId() ?>">Mon profil</a>
                <a class="responsive-menu" href="/?c=user&a=disconnect">Déconnexion</a><?php
            }
        ?>

    </div>

</header>

<main><?= $html ?></main>

<footer>
    <div>
        <a href="/?c=home"><img id="logo" src="/assets/img/logo/first-image1.png" alt=""></a>
    </div>

    <div id="bottom">
    <a href="/?c=user&a=save-form">Contact</a>
    <a href="/?c=form&a=confidentiality">Confidentialité</a>
    </div>
</footer>

<script src="https://kit.fontawesome.com/6167e09880.js" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="/assets/js/Carousel.js"></script>
<script src="/assets/js/app.js"></script>

</body>
</html>