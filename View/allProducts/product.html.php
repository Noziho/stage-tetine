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
        <p>Prix: <?= $product->getPrice() ?> €</p>
    </div>

    <div>

        <?php
        if (!isset($_SESSION['user'])) { ?>
            <p>Pour ajoutez un article au panier veuillez <span class="login_link"><a href="/?c=user&a=login">vous connecter</a></span></p><?php
        } else { ?>
        <form action="/?c=basket&a=add-basket&id=<?= $product->getId() ?>&p=<?= $product->getPrice() ?>" method="post">
                <label for="quantity">Quantité: </label>
                <select name="quantity" id="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="submit" value="Ajoutez au panier" name="submit">
            </form><?php
        }
        ?>

    </div>

</div>
