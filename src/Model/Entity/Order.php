<?php

namespace App\Model\Entity;

class Order extends AbstractEntity
{
    private int $user_fk;

    /**
     * @return int
     */
    public function getUserFk(): int
    {
        return $this->user_fk;
    }

    /**
     * @param int $user_fk
     * @return Order
     */
    public function setUserFk(int $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }




}