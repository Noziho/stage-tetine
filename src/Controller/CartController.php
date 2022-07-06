<?php

namespace App\Controller;

use App\Model\Entity\User;

class CartController extends AbstractController
{

    public function index()
    {
        $this->render('cart/cart');
    }

    /* @var User $user */
    /**
     * $currentUser = $user->getId();
     * CartManager::addProductToCart($id, $quantity, $p, $currentUser);
     * $this->render('user/basket');
     * } **/


    //TODO: Need to be fix for delete product on cart one by one, not all at the same time.
    public function deleteCart($id)
    {
        foreach ($_SESSION['product'] as $item) {
            foreach ($item as $product) {
                if ($product['product']->getId() == $id) {
                    unset($_SESSION['product']);
                }
            }

            header("Location: /?c=cart");
            unset($_SESSION['product']);
            exit();
        }

//    /**
//     * @param int $id
//     * @return void
//     */
//    public function deleteCart(int $id)
//    {
//        if(CartManager::CartExists($id)) {
//            $cart = CartManager::getBasket($id);
//            $deleted = CartManager::deleteCart($cart);
//        }
//        $this->index();
//    }

    }
}
