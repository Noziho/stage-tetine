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
}