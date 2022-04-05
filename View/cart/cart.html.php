<?php

use App\Model\Entity\Basket;
use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;


if (isset($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $item) {
        foreach ($item as $product) {
            /* @var Product $product */?>
            <div id="cartContainer">

                <div>
                    <img
                        src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product['product']->getId()) ?>/<?= str_replace(' ', '', $product['product']->getImage()) ?>.jpg"
                        alt="">
                </div>

                <div>
                    <p>Quantité: <?= $product['quantity'] ?></p>
                    <p>Nom du produit: <?= $product['product']->getProductName() ?></p>
                    <p>Prénom: <?= $product['firstname'] ?></p>
                    <p>Écriture: <?= $product['font_family'] ?></p>
                    <p><?= $product['color'] ?></p>
                    <p>Embout: <?= $product['tips'] ?></p>
                    <p>Prix: <?= $product['product']->getprice() ?>€</p>
                    <button class="submit-button" id="delete_cart_product"><a href="/index.php?c=basket&a=delete-cart&id=<?= $product['product']->getId() ?>">Supprimer</a></button>
                </div>

            </div>




            <?php
        }
    }?>
    <?php
}
else {?>
    <div class="emptyCartContainer">
        <div>
            <p>Votre panier est vide.</p>
        </div>

    </div><?php
}