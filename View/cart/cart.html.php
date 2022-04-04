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

                <p>Quantité: <?= $product['quantity'] ?></p>
                <p>Nom du produit: <?= $product['product']->getProductName() ?></p>
                <p>Prénom: <?= $product['firstname'] ?></p>
                <p>Écriture: <?= $product['font_family'] ?></p>
                <p><?= $product['color'] ?></p>
                <p>Embout: <?= $product['tips'] ?></p>
                <p>Prix: <?= $product['product']->getprice() ?>€</p>
            </div>


            <a href="/index.php?c=cart&a=delete-cart&id=<?= $product['product']->getId() ?>">Supprimer</a>

            <?php
        }
    }?>
    <?php
}
else {?>
    <div id="cartContainerEmpty">
        <p>Votre panier est vide.</p>
    </div><?php
}