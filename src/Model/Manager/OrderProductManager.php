<?php

namespace App\Model\Manager;

use App\Model\DB_Connect;
use App\Model\Entity\Order;
use App\Model\Entity\Product;

class OrderProductManager
{
    private const TABLE = "mdf58_order_product";



    public static function addOrderProduct ($order, $product, string $name, string $tips, string $font_family, string $text_color, string $order_quantity, string $age)
    {

        $stmt = DB_Connect::dbConnect()->prepare("
            INSERT INTO ". self::TABLE ." (order_fk, product_fk, name, tips, font_family, text_color, order_quantity, age)
            VALUES (:order_fk, :product_fk, :name, :tips, :font_family, :text_color, :order_quantity, :age)
        ");



        $stmt->bindValue(':order_fk', $order->getId());
        $stmt->bindValue(':product_fk', $product->getId());
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':tips', $tips);
        $stmt->bindValue(':font_family', $font_family);
        $stmt->bindValue(':text_color', $text_color);
        $stmt->bindValue(':order_quantity', $order_quantity);
        $stmt->bindValue(':age', $age);


        $stmt->execute();
    }
}