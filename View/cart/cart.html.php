<?php

use App\Model\Entity\Product;
use App\Model\Manager\CategoryManager;


if (isset($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $item) {
        foreach ($item as $product) {
            /* @var Product $product */ ?>
            <div id="cartContainer">
                <div>
                    <img id="img-cart"
                        src="/assets/img/category/<?= CategoryManager::getCategoryByProduct($product['product']->getId()) ?>/<?= str_replace(' ', '', $product['product']->getImage()) ?>.jpg"
                        alt="">
                </div>

                <div>
                    <p id="title-product"><?= $product['product']->getProductName() ?></p>
                    <p><?= $product['firstname'] ?></p>
                    <p><?= $product['font_family'] ?></p>
                    <p><?= $product['color'] ?></p>
                    <p><?= $product['tips'] ?></p>
                    <p id="price"><?= $product['product']->getprice() ?>€</p>
                    <button class="submit-button" id="delete_cart_product"><a
                                href="/index.php?c=cart&a=delete-cart&id=<?= $product['product']->getId() ?>">Supprimer</a>
                    </button>
                </div>

                <div id="details-order">
                    <p>Quantité: <?= $product['quantity'] ?></p>
                    <p class="price-order">Prix: <?= $product['product']->getprice()*$product['quantity'] ?>€</p>
                </div>
            </div>
            <?php
        }
    }?>
    <div id="total-order">
        <p>Total de la commande :</p>

    </div>

     <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        const main = document.querySelector('main');
                        const paypalButton = document.querySelector('#paypal-button-container');
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '35.50'// Can also reference a variable or function
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
                                    if (transaction.status === "COMPLETED") {
                                        fetch('/?c=orderProduct')
                                            .then(response => response.json())
                                            .then(response => {
                                                console.log(response);
                                            });

                                        main.innerHTML =" <div class='emptyCartContainer'>Transaction effectuée vous recevrez votre commande sous 1 semaine</div>";
                                        paypalButton.style.display = 'none';

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
};