<?php

use App\Model\Entity\Basket;
use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;


if (isset($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $item) {
        foreach ($item as $product) {
            /* @var Product $product */ ?>
            <div id="cartContainer">

                <div>
                    <img
                            src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product['product']->getId()) ?>/<?= str_replace(' ', '', $product['product']->getImage()) ?>.jpg"
                            alt="">
                </div>

                <div>
                    <p>Quantité: <?= $product['quantity'] ?></p>
                    <p>Nom du produit: <?= $product['product']->getProductName() ?></p>
                    <p>Prénom: <?= $product['firstname'] ?></p>
                    <p>Écriture: <?= $product['font_family'] ?></p>
                    <p><?= $product['color'] ?></p>
                    <p>Embout: <?= $product['tips'] ?></p>
                    <p>Prix: <?= $product['product']->getprice() ?>€</p>
                    <button class="submit-button" id="delete_cart_product"><a
                                href="/index.php?c=basket&a=delete-cart&id=<?= $product['product']->getId() ?>">Supprimer</a>
                    </button>
                </div>

            </div>


            <?php
        }
    }?>
     <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '1.5' // Can also reference a variable or function
                                        }
                                    }]
                                });
                            },
                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {
                                return actions.order.capture().then(function (orderData) {
                                    // Successful capture! For dev/demo purposes:
                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                    if (transaction.status === "COMPLETED") {

                                    }
                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                });
                            }
                        }).render('#paypal-button-container');
                    </script><?php
}

else { ?>
    <div class="emptyCartContainer">
        <div>
            <p>Votre panier est vide.</p>
        </div>

    </div><?php
}