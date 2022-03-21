<?php

namespace App\Model\Manager;

use App\Model\Entity\User;
use DB_Connect;

class UserManager extends AbstractManager
{
    public const TABLE = "mdf58_user";

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $users = [];
        $result = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE);

        if($result) {
            foreach ($result->fetchAll() as $data) {
                $users[] = self::makeUser($data);
            }
        }
        return $users;
    }

    /**
     * @param int $id
     * @return User|null
     */
    public static function getUserById(int $id): ?User
    {
        $result = DB_Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeUser($result->fetch()) : null;
    }

    /**
     * @param array $data
     * @return User
     */
    private static function makeUser(array $data): User
    {
        return (new User())
            ->setId($data['id'])
            ->setPassword($data['password'])
            ->setEmail($data['email'])
            ->setLastname($data['lastname'])
            ->setFirstname($data['firstname'])
            ->setPhoneNumber($data['phone_number'])
            ->setCity($data['city'])
            ->setCodePostal($data['postal_code'])
            ->setAddress($data['adress'])
            ->setRole($data['role_fk'])
            ;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user): bool
    {
        $stmt = DB_Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (email, firstname, lastname, password,phone_number,city,postal_code,adress, role_fk) 
            VALUES (:email, :firstname, :lastname, :password, :phoneNumber, :city, :postalCode, :address, :role_fk)
        ");

        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':phoneNumber', $user->getPhoneNumber());
        $stmt->bindValue(':city', $user->getCity());
        $stmt->bindValue(':postalCode', $user->getCodePostal());
        $stmt->bindValue(':address', $user->getAddress());
        $stmt->bindValue(':role_fk',$user->getRole());

        $result = $stmt->execute();
        $user->setId(DB_Connect::dbConnect()->lastInsertId());

        return $result;
    }

        /**
         * @param int $id
         * @return bool
         */
        public static function userExists(int $id): bool
    {
        $result = DB_Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

        /**
         * @param string $mail
         * @return bool
         */
        public static function mailExists(string $mail): bool
    {
        $result = DB_Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE email = \"$mail\"");
        return $result ? $result->fetch()['cnt'] : 0;
    }

        /**
         * delete User
         * @param User $user
         * @return bool
         */
        public static function deleteUser(User $user): bool {
        if(self::userExists($user->getId())) {
            return DB_Connect::dbConnect()->exec("
            DELETE FROM " . self::TABLE . " WHERE id = {$user->getId()}
        ");
        }
        return false;
    }

        /**
         * @param string $mail
         * @return User|null
         */
        public static function getUserByMail(string $mail): ?User
    {
        $stmt = DB_Connect::dbConnect()->prepare("SELECT * FROM " . self::TABLE . " WHERE email = :mail LIMIT 1");
        $stmt->bindParam(':mail', $mail);
        return $stmt->execute() ? self::makeUser($stmt->fetch()) : null;
    }
}