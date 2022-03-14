<?php

namespace App\Model\Entity;

class User extends AbstractEntity
{
    private string $firstname;
    private string $lastname;
    private int $phone_number;
    private string $password;
    private string $email;
    private string $city;
    private string $code_postal;
    private string $address;
    private Role $role;

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): int
    {
        return $this->phone_number;
    }

    /**
     * @param int $phone_number
     * @return User
     */
    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return User
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->code_postal;
    }

    /**
     * @param string $code_postal
     * @return User
     */
    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return User
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param Role $role
     * @return User
     */
    public function setRole(Role $role): self
    {
        $this->role = $role;
        return $this;
    }
}