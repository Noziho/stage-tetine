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
<div class="container"><?php
    foreach ($products as $product) {
        /* @var Product $product */?>

            <div class="container-image">
                <div>
                    <a href="">
                    <img class="product-images" src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?=str_replace(' ', '', $product->getImage()) ?>.jpg" alt="">
                    <div class="product-details">
                        <p><?= $product->getProductName() ?></p>
                        <p>Prix: <?= $product->getPrice() ?>€</p>
                    </div>
                    </a>
                </div>
            </div>
        <?php

    }?>
</div>










