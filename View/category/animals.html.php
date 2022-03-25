<?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;

if (isset($data['products'])) {
    $products = $data['products'];
}?>

<div id="category">

    <p><a href="/?c=product&a=category-disney">Disney</a></p>
    <p><a href="/?c=product&a=category-flags">Drapeaux</a></p>
    <p><a href="/?c=product&a=category-brother-and-sister">Frère et soeur</a></p>
    <p><a href="/?c=product&a=category-brands">Marques</a></p>
    <p><a href="/?c=product&a=category-god-mother-god-father">Parrains/Marraines</a></p>
    <p><a href="/?c=product&a=category-message">Messages</a></p>
    <p><a href="/?c=product&a=category-parents">Parents</a></p>
    <p><a href="/?c=product&a=category-sport">Sport</a></p>
    <p><a href="/?c=product&a=category-animals">Animaux</a></p>
    <p><a href="/?c=product&a=category-logo-various">Logo&divers</a></p>
</div>

<div class="container"><?php
    foreach ($products as $product) {
        /* @var Product $product */?>

        <div class="container-image">
            <div>
                <a href="/?c=product&a=show-product&id=<?= $product->getId() ?>">
                    <img class="product-images" src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?=str_replace(' ', '', $product->getImage()) ?>.jpg" alt="">
                    <div class="product-details">
                        <p><?= ucfirst($product->getProductName()) ?></p>
                        <p>Prix: <?= $product->getPrice() ?>€</p>
                    </div>
                </a>
            </div>
        </div>


        <?php

    }?>
</div>


