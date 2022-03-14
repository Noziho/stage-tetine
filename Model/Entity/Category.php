<?php

namespace App\Model\Entity;

class Category extends AbstractEntity
{
    private string $category;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Category
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

}