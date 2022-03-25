<?php

use App\Model\Entity\Product;
use App\Model\Entity\User;
use App\Model\Manager\BasketManager;

class BasketController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function addBasket (int $id, int $p) {

        $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
        $user = $_SERVER['user'];
        /* @var User $user */
        $currentUser = $user->getId();
        BasketManager::addProductToBasket($id, $quantity, $p, $currentUser);
        $this->render('user/basket');
    }

}
