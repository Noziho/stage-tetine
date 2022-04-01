<?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;

if (isset($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $item) {
        foreach ($item as $product) {
            /* @var Product $product */?>
            <div>
                <div>
                    <img
                        src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product['product']->getId()) ?>/<?= str_replace(' ', '', $product['product']->getImage()) ?>.jpg"
                        alt="">
                </div>

                <p>Nom du produit: <?= $product['product']->getProductName() ?></p>
                <p>Prénom: <?= $product['firstname'] ?></p>
                <p>Écriture: <?= $product['font_family'] ?></p>
                <p><?= $product['color'] ?></p>
                <p>Embout: <?= $product['tips'] ?></p>
                <p>Prix: <?= $product['product']->getprice() ?>€</p>
            </div>
            <?php
        }
    }
}