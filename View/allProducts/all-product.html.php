<h1>Liste des produits</h1>

<div id="container">
    <div><img src="" alt=""></div>
    <p></p>
</div><?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;


if (isset($data['products'])) {
    $products = $data['products'];

}?>

<div id="category">
    <p>Animaux</p>
    <p>Disney</p>
    <p>Drapeaux</p>
    <p>Frère et Soeur</p>
    <p>Logo Divers</p>
    <p>Marques</p>
    <p>Marraine Parrain</p>
    <p>Message</p>
    <p>Parents</p>
    <p>Sport</p>
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












