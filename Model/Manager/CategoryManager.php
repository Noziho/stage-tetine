<?php

namespace App\Model\Manager;

use App\Model\Entity\Category;
use App\Model\Entity\Product;
use DB_Connect;

class CategoryManager
{
    public const TABLE = 'mdf58_category';

    public static function getCategoryByProduct (int $id): string

    {
        $query = DB_Connect::dbConnect()->query("
            SELECT * FROM ". self::TABLE . " WHERE id IN ( SELECT category_fk FROM mdf58_product WHERE id = $id);
        ");

        if ($query) {
            foreach ($query->fetchAll() as $categoryData) {
                $category = (new Category())
                    ->setId($categoryData['id'])
                    ->setCategory($categoryData['name']);
            }
        }
        return $category->getCategory();
    }

    public static function getProductById (int $id): ?Product
    {
        $query = DB_Connect::dbConnect()->query(" SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $query ?CategoryManager::makeProduct($query->fetch()) : null;
    }

    public static function makeProduct (array $data):Product
    {
        $product = (new Product())
            ->setId($data['id'])
            ->setProductName($data['product_name'])
            ->setPrice($data['price']);
            return $product->setCategory(CategoryManager::getCategoryByProduct((int)$product));
    }
}