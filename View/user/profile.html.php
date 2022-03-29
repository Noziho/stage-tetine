<?php
use App\Model\Entity\User;

/* @var User $user */
$user = $data['profile'];

?>

<h1 id="title-profile">Mon Profil</h1>

<div id="container-profile">
    <div id="profile">
        <p>Prénom: <?= $user->getFirstname() ?></p>
        <p>Nom: <?= $user->getLastname() ?></p>
        <p>Email: <?= $user->getEmail() ?></p>
        <p>Phone: 0<?= $user->getPhoneNumber() ?></p>
        <p>Ville: <?= $user->getCity() ?></p>
        <p>Code Postal: <?= $user->getCodePostal() ?></p>
        <p>Adresse: <?= $user->getAddress() ?></p>
    </div>
    <a href=""></a>
</div>




