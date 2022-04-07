<?php

use App\Model\Entity\User;

/* @var User $user */
$user = $data['profile'];

?>

<h1 id="title-profile"> Mon Profil</h1>

<div id="profile-container">
    <form action="/index.php?c=user&a=edit-user&id=<?= $user->getId() ?>" method="post">
        <div id="container-profile">
            <div class="profile">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" value="<?= $user->getFirstname() ?>">
            </div>
            <div>
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" value="<?= $user->getLastname() ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $user->getEmail() ?>">
            </div>
            <div>
                <label for="phone">Numéro de téléphone</label>
                <input type="text" name="phone-number" value="0<?= $user->getPhoneNumber() ?>">
            </div>
            <div>
                <label for="city">Ville</label>
                <input type="text" name="city" value="<?= $user->getCity() ?>">
            </div>
            <div>
                <label for="postal">Code Postal</label>
                <input type="text" name="postal-code" value="<?= $user->getCodePostal() ?>">
            </div>
            <div>
                <label for="address">Adresse</label>
                <input type="text" name="adress" value="<?= $user->getAddress() ?>">
            </div>

            <input type="submit" name="submit" value="Modifier" class="submit-button">

        </div>

        <a id="account-deletion" href="/index.php?c=user&a=delete-user&id=<?= $user->getId() ?>">Suppression du compte</a>
    </form>
</div>





