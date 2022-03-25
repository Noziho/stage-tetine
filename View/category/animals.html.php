<?php

use App\Model\Entity\Product;

if (isset($data['products'])) {
    $products = $data['products'];
}

foreach ($products as $product) {
    /* @var Product $product */?>

    <p><?= $product->getProductName() ?></p><?php

}

