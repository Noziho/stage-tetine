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
        <img
                src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?= str_replace(' ', '', $product->getImage()) ?>.jpg"
                alt="">
    </div>

    <div>
        <p>Produit: <?= $product->getProductName() ?></p>
        <p>Prix: <?= $product->getPrice() ?></p>
    </div>

    <div>
        <form action="/?c=product&a=add-basket">
            <input type="submit" value="Ajoutez au panier">
        </form>
    </div>

</div>
