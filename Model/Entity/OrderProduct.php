<?php

use App\Model\Entity\AbstractEntity;
use App\Model\Entity\Order;
use App\Model\Entity\Product;

class OrderProduct extends AbstractEntity
{
    private Order $order_fk;
    private Product $product_fk;
    private string $tips;
    private string $font_family;
    private string $text_color;
    private int $quantity;
    private int $age;

    /**
     * @return Order
     */
    public function getOrderFk(): Order
    {
        return $this->order_fk;
    }

    /**
     * @param Order $order_fk
     */
    public function setOrderFk(Order $order_fk): self
    {
        $this->order_fk = $order_fk;
        return $this;
    }

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
    public function setProductFk(Product $product_fk): self
    {
        $this->product_fk = $product_fk;
        return $this;
    }

    /**
     * @return string
     */
    public function getTips(): string
    {
        return $this->tips;
    }

    /**
     * @param string $tips
     */
    public function setTips(string $tips): self
    {
        $this->tips = $tips;
        return $this;
    }

    /**
     * @return string
     */
    public function getFontFamily(): string
    {
        return $this->font_family;
    }

    /**
     * @param string $font_family
     */
    public function setFontFamily(string $font_family): self
    {
        $this->font_family = $font_family;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->text_color;
    }

    /**
     * @param string $text_color
     */
    public function setTextColor(string $text_color): self
    {
        $this->text_color = $text_color;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }


}