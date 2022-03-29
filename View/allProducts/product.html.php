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

        <div class="embout">
            <h2>Embouts</h2>
            <div>
                <div class="container-embout">
                    <img src="/assets/img/tips/embout%20anatomique.png" alt="Embout anatomique">

                    <img src="/assets/img/tips/embout%20cerise.png" alt="Embout cerise">

                </div>

                <div class="container-embout">
                    <img src="/assets/img/tips/embout%20dynamique%20LOVI.png" alt="Embout dynamique">

                   <img src="/assets/img/tips/embout%20physiologique.png" alt="Embout physiologique"
                </div>

            </div>
        </div>
    </div>


    <div id="price_name_product">
        <p>Produit: <?= $product->getProductName() ?></p>
        <p>Prix: <?= $product->getPrice() ?> €</p>
    </div>

    <div>

        <?php
        if (!isset($_SESSION['user'])) { ?>
            <p>Pour ajoutez un article au panier veuillez <span class="login_link"><a href="/?c=user&a=login">vous connecter</a></span></p><?php
        } else { ?>
        <form action="/?c=basket&a=add-basket&id=<?= $product->getId() ?>&p=<?= $product->getPrice() ?>" method="post">
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

                <label for="tips">Embout: </label>
                <select name="tips" id="tips">
                    <option value="Anatomique">Anatomique</option>
                    <option value="Cerise">Cerise</option>
                    <option value="Dynamique">Dynamique</option>
                    <option value="Physiologique">Physiologique</option>
                </select>
                <input type="submit" value="Ajoutez au panier" name="submit">
            </form><?php
        }
        ?>

    </div>

</div>
