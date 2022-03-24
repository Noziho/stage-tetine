<?php

namespace App\Model\Manager;

use App\Model\Entity\Product;
use App\Model\Entity\User;
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


    public static function getProductById (int $id) {
        $query = DB_Connect::dbConnect()->query(
            "SELECT * FROM " . self::TABLE . " WHERE id = $id
        ");
        return $query ? self::makeProduct($query->fetch()) : null;

    }

    public static function makeProduct (array $data) {
        return (new Product())
            ->setId($data['id'])
            ->setProductName($data['product_name'])
            ->setPrice($data['price'])
            ->setImage($data['image'])
            ->setCategory($data)
            ;
    }
}