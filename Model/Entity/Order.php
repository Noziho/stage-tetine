<?php

namespace App\Model\Entity;

class Order extends AbstractEntity
{
    private User $user_fk;

    /**
     * @return User
     */
    public function getUserFk(): User
    {
        return $this->user_fk;
    }

    /**
     * @param User $user_fk
     */
    public function setUserFk(User $user_fk): self
    {
        $this->user_fk = $user_fk;
        return $this;
    }


}