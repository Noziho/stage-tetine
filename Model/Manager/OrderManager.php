<?php

namespace App\Model\Manager;

use App\Model\Entity\Order;

use DB_Connect;

class OrderManager
{
    private const TABLE = "mdf58_order";


    public static function addOrder (int $id) {
        $query = DB_Connect::dbConnect()->query("
            INSERT INTO ". self::TABLE ." (user_fk)
            VALUES ($id);
        ");

        $query->execute();

    }

    public static function getOrderByUserId (int $id) {
        $query = DB_Connect::dbConnect()->query("
            SELECT * FROM ". self::TABLE ." WHERE user_fk = $id
        ");

        return $query ? self::makeOrder($query->fetch()) : null;
    }

    public static function makeOrder ($data)
    {
        return (new Order())
            ->setId($data['id'])
            ->setUserFk($data['user_fk']);
    }
}