<?php

namespace App\Model\Manager;


use App\Model\Entity\Basket;
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

    public static function CartExists(int $id)
    {
        $result = DB_Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    public static function getBasket(int $id): ?Basket
    {
        $result = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeBasket($result->fetch()) : null;
    }

    private static function makeBasket(array $data): Basket
    {
        return (new Basket())
            ->setId($data['id'])
            ->setQuantity($data['quantity']);
    }

    public static function deleteCart(Basket $basket): bool {
        if(self::CartExists($basket->getId())) {
            return DB_Connect::dbConnect()->exec("
            DELETE FROM " . self::TABLE . " WHERE id = {$basket->getId()}
        ");
        }
        return false;
    }
}