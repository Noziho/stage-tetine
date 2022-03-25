<?php

namespace App\Model\Manager;


use App\Model\Entity\Product;
use DB_Connect;

class BasketManager  extends AbstractManager
{
    private const TABLE = 'mdf58_basket';

    public static function addProductToBasket (int $productId, int $quantity, int $price, int $user)
    {

        $stmt = DB_Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (quantity, price, product_fk, user_fk) 
            VALUES (:quantity, :price, :product_fk, :user_fk)
        ");

        $stmt->bindParam(':product_fk', $productId);
        $stmt->bindParam(':quantity', $quantity );
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':user_fk', $user);

        $stmt->execute();
    }

}