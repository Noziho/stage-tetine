<?php

namespace App\Model\Manager;

use App\Model\Entity\Product;
use DB_Connect;

class ProductManager extends AbstractManager
{
    public const TABLE = "mdf58_product";
    public static function getAll() :array
    {
        $images = [];
        $query  = DB_Connect::dbConnect()->query("SELECT * FROM ". self::TABLE);

        if ($query) {
            $productManager = new ProductManager();

            foreach ($query->fetchAll() as $imageData) {
                $images[] = (new Product())
                    ->setId($imageData['id'])
                    ->setPrice($imageData['price'])
                    ->setProductName($imageData['product_name'])
                    ->setImage($imageData['image']);
            }
        }
        return $images;
    }
}