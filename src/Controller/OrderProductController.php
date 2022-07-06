<?php

namespace App\Controller;

use App\Model\Entity\User;
use App\Model\Manager\OrderManager;
use App\Model\Manager\OrderProductManager;

class OrderProductController extends AbstractController
{

    public function index()
    {

        $user = $_SESSION['user'];
        /* @var User $user */
        OrderManager::addOrder($user->getId());
        $order = OrderManager::getOrderByUserId($user->getId());

        foreach ($_SESSION['product'] as $item) {
            foreach ($item as $product) {

                $currentProduct = $product['product'];
                $tips = $product['tips'];
                $font_family = $product['font_family'];
                $text_color = $product['color'];
                $order_quantity = $product['quantity'];
                $age = $product['age'];

                OrderProductManager::addOrderProduct($order, $currentProduct, $tips, $font_family, $text_color, $order_quantity, $age);
                unset($_SESSION['product']);

            }
        }


    }

    public function addOrder()
    {
        //TODO
    }
}