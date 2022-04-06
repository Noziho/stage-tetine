<?php

namespace App\Model\Manager;

use App\Model\Entity\AbstractEntity;
use App\Model\Entity\Product;
use App\Model\Entity\User;
use DB_Connect;

class ProductManager
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

    /**
     * @param int $id
     * @return array
     */
    public static function getProductByCategory(int $id): array
    {
        $query = DB_Connect::dbConnect()->query("
            SELECT * FROM mdf58_product WHERE category_fk = $id;
        ");

        if ($query) {
            $products = [];
            foreach ($query->fetchAll() as $productData) {
                $products[] = (new Product())
                    ->setId($productData['id'])
                    ->setProductName($productData['product_name'])
                    ->setImage($productData['image'])
                    ->setPrice($productData['price'])
                    ->setCategory($productData);
            }
        }
        return $products;
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