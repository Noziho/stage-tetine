<?php

class ProductController extends AbstractController
{
    public function index()
    {
        $this->render('allProducts/all-product');
    }
}