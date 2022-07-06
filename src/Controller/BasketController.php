<?php

namespace App\Controller;

use App\Model\Entity\User;

class BasketController extends AbstractController
{

    public function index()
    {
        $this->render('cart/cart');
    }

    /* @var User $user */
    /**
     * $currentUser = $user->getId();
     * BasketManager::addProductToBasket($id, $quantity, $p, $currentUser);
     * $this->render('user/basket');
     * } **/

    public function deleteCart($id)
    {
        foreach ($_SESSION['product'] as $item) {
            foreach ($item as $product) {
                if ($product['product']->getId() == $id) {
                    echo "MAHWII";

                }
            }

            unset($product['product']);
            $this->render('cart/cart');
        }

//    /**
//     * @param int $id
//     * @return void
//     */
//    public function deleteCart(int $id)
//    {
//        if(BasketManager::CartExists($id)) {
//            $cart = BasketManager::getBasket($id);
//            $deleted = BasketManager::deleteCart($cart);
//        }
//        $this->index();
//    }

    }
}
