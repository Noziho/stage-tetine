<?php

namespace App\Model\Manager;


use App\Model\Entity\Product;
use DB_Connect;

class BasketManager  extends AbstractManager
{
    private const TABLE = 'mdf58_basket';

    public static function addProductToBasket (int $productId, int $quantity)
    {

        $stmt = DB_Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (quantity, product_fk) 
            VALUES (:quantity, :product_fk)
        ");

        $stmt->bindParam(':product_fk', $productId);
        $stmt->bindParam(':quantity', $quantity );

        $stmt->execute();
    }

}