<?php


namespace App\Model\Entity;

class ProductBasket extends AbstractEntity
{
    public Product $product_fk;
    public Basket $basket_fk;

    /**
     * @return Product
     */
    public function getProductFk(): Product
    {
        return $this->product_fk;
    }

    /**
     * @param Product $product_fk
     */
    public function setProductFk(Product $product_fk): void
    {
        $this->product_fk = $product_fk;
    }

    /**
     * @return Basket
     */
    public function getBasketFk(): Basket
    {
        return $this->basket_fk;
    }

    /**
     * @param Basket $basket_fk
     */
    public function setBasketFk(Basket $basket_fk): void
    {
        $this->basket_fk = $basket_fk;
    }

}