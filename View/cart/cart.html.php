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

            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="XW4XB9HLKH4W8">
                <table>
                    <tr><td><input type="hidden" name="on0" value="Tétine">Tétine</td></tr><tr><td><select name="os0">
                                <option value="1 Unité">1 Unité €9,00 EUR</option>
                                <option value="2 Unités">2 Unités €16,00 EUR</option>
                                <option value="3 Unités">3 Unités €22,00 EUR</option>
                            </select> </td></tr>
                </table>
            </form>
            <a href="/index.php?c=cart&a=delete-cart&id=<?= $product['product']->getId() ?>">Supprimer</a>

            <?php
        }
    }?>
    <input type="hidden" name="currency_code" value="EUR">
                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1"><?php
}
else {?>
    <div id="cartContainerEmpty">
        <p>Votre panier est vide.</p>
    </div><?php
}