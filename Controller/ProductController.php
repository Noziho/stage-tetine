<?php

use App\Model\Manager\CategoryManager;
use App\Model\Manager\ProductManager;

class ProductController extends AbstractController
{
    public function index()
    {
        $this->render('allProducts/all-product', [
            'products' => ProductManager::getAll(),
        ]);
    }

    public function showProduct (int $id)
    {
        if (null === $id) {
            header("Location: /index.php?c=home");
        }


        $this->render('allProducts/product', [
            'product' => ProductManager::getProductById($id),
        ]);
    }
}