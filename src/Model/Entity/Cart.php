<?php

namespace App\Model\Entity;

class Cart extends AbstractEntity
{

    private int $quantity;

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Cart
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }


}