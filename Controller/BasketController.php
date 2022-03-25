<?php

use App\Model\Entity\Product;
use App\Model\Manager\BasketManager;

class BasketController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function addBasket (int $id) {

        $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
        BasketManager::addProductToBasket($id, $quantity);
        $this->render('user/basket');
    }

}
