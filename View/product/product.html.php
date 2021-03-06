<?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;

if (isset($data['product'])) {
    $product = $data['product'];
}
/* @var Product $product */

?>


<div id="product-container">
    <div>
        <div>
            <img
                    src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?= str_replace(' ', '', $product->getImage()) ?>.jpg"
                    alt="">
        </div>

        <div>
            <h2>Embouts</h2>
            <div>
                <div class="container-embout">
                    <img src="/assets/img/tips/embout%20anatomique.png" alt="Embout anatomique">
                    <span>Embout anatomique</span>

                    <img src="/assets/img/tips/embout%20cerise.png" alt="Embout cerise">
                    <span>Embout cerise</span>

                </div>

                <div class="container-embout">
                    <img src="/assets/img/tips/embout%20dynamique%20LOVI.png" alt="Embout dynamique">
                    <span>Embout dynamique</span>

                    <img src="/assets/img/tips/embout%20physiologique.png" alt="Embout physiologique">
                    <span>Embout physiologique</span>
                </div>
            </div>

            <div class="container-font" id="">
                <img class="font-family" src="/assets/img/font/font-family.png" alt="">
            </div>
        </div>
    </div>

    <?php
    if (!isset($_SESSION['user'])) { ?>
        <p>Pour ajoutez un article au panier veuillez <span class="login_link"><a
                        href="/?c=user&a=login">vous connecter</a></span>
        </p><?php
    } else { ?>
    <form action="/?c=product&a=addProductToCart&p=<?= $product->getId() ?>"
          method="post">
            <label for="quantity">Quantité: </label>
            <select name="quantity" id="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <label for="first_name">Prénom: </label>
            <input id="first_name" name="first_name" type="text" min="2" maxlength="55">

            <label for="tips">Embout: </label>
            <select name="tips" id="tips">
                <option value="Anatomique">Anatomique</option>
                <option value="Cerise">Cerise</option>
                <option value="Dynamique">Dynamique</option>
                <option value="Physiologique">Physiologique</option>
            </select>

            <label for="age">Age: </label>
            <select name="age" id="age">
                <option value="6">0/6mois</option>
                <option value="36">6/36 mois</option>
            </select>

            <label for="color"> Couleur: </label>
                <select name="color" id="color">
                    <option class="pink" value="Rose">Rose</option>
                    <option class="violet" value="Violet">Violet</option>
                    <option class="skyBlue" value="Bleu ciel">Bleu ciel</option>
                    <option class="blue" value="Bleu marine">Bleu marine</option>
                    <option class="yellow" value="Jaune">Jaune</option>
                    <option class="red" value="Rouge">Rouge</option>
                    <option class="appleGreen" value="Pomme">Pomme</option>
                    <option class="fushia" value="Fushia">Fushia</option>
                    <option class="black" value="Noir">Noir</option>
                    <option class="cyan" value="Cyan">Cyan</option>
                    <option class="white" value="Blanc">Blanc</option>
                    <option class="orange" value="Orange">Orange</option>
                    <option class="brown" value="Marron">Marron</option>
                    <option class="green" value="Vert">Vert</option>
                </select>
            
            <label for="font_family"> Police d'écriture: </label>
            <select name="font_family" id="font_family">
                <option value="Police d'écriture 1">Écriture 1</option>
                <option value="Police d'écriture 2">Écriture 2</option>
                <option value="Police d'écriture 3">Écriture 3</option>
                <option value="Police d'écriture 4">Écriture 4</option>
                <option value="Police d'écriture 5">Écriture 5</option>
                <option value="Police d'écriture 6">Écriture 6</option>
                <option value="Police d'écriture 7">Écriture 7</option>
                <option value="Police d'écriture 8">Écriture 8</option>
                <option value="Police d'écriture 9">Écriture 9</option>
                <option value="Police d'écriture 10">Écriture 10</option>
            </select>
            

            <input class="submit-button" type="submit" value="Ajoutez au panier" name="submit">
        </form><?php
    }
    ?>
