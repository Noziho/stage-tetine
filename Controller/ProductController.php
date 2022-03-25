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

    public function categoryDisney()
    {
        $this->render('category/animals', [
            'products'=> ProductManager::getProductByCategory(1),
            ]);
    }

    public function categoryFlags()
    {
        $this->render('category/flags', [
            'products'=> ProductManager::getProductByCategory(2),
        ]);
    }

    public function categoryBrotherAndSister()
    {
        $this->render('category/brotherAndSister', [
            'products'=> ProductManager::getProductByCategory(3),
        ]);
    }

    public function categoryBrands()
    {
        $this->render('category/brands', [
            'products'=> ProductManager::getProductByCategory(4),
        ]);
    }

    public function categoryGodMotherGodFather()
    {
        $this->render('category/godmotherGodfather', [
            'products'=> ProductManager::getProductByCategory(5),
        ]);
    }

    public function categoryMessage()
    {
        $this->render('category/message', [
            'products'=> ProductManager::getProductByCategory(6),
        ]);
    }

    public function categoryParents()
    {
        $this->render('category/parents', [
            'products'=> ProductManager::getProductByCategory(7),
        ]);
    }

    public function categorySport()
    {
        $this->render('category/sport', [
            'products'=> ProductManager::getProductByCategory(8),
        ]);
    }

    public function categoryAnimals()
    {
        $this->render('category/animals', [
            'products'=> ProductManager::getProductByCategory(9),
        ]);
    }

    public function categoryLogoVarious()
    {
        $this->render('category/logoVarious', [
            'products'=> ProductManager::getProductByCategory(10),
        ]);
    }
}