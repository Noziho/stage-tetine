<h1>Liste des produits</h1>

<div id="container">
    <div><img src="" alt=""></div>
    <p></p>
</div><?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;


if (isset($data['products'])) {
    $products = $data['products'];

}
    foreach ($products as $product) {
        /* @var Product $product */?>
        <img src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product->getId()) ?>/<?=str_replace(' ', '', $product->getImage()) ?>.jpg" alt="">
        <p><?= $product->getProductName() ?></p>
        <p><?= $product->getPrice() ?>€</p><?php

    }?>











