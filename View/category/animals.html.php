<?php

use App\Model\Entity\Product;

if (isset($data['products'])) {
    $products = $data['products'];
    echo '<pre>';
    var_dump($products);
    echo '</pre>';
    die();
}

foreach ($products as $product) {
    /* @var Product $product */?>

    <p><?= $product->getProductName() ?></p><?php

}

