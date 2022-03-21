<?php

use App\Model\Entity\Role;
use App\Model\Entity\User;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{

    public function index()
    {
        $this->render('user/register');
    }

    public function register()
    {
        if (!$this->formIsset
        ('submit', 'mail', 'firstname', 'lastname', 'password', 'password-repeat',
            'phone-number', 'adress', 'city', 'postal-code')) {
            header("Location: /?c=home");
        }

            $mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
            $phoneNumber = filter_var($_POST['phone-number'], FILTER_SANITIZE_NUMBER_INT);
            $phoneNumber = (int)$phoneNumber;
            $adress = filter_var($_POST['adress'], FILTER_SANITIZE_STRING);
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $postalCode = filter_var($_POST['postal-code'], FILTER_SANITIZE_STRING);

            $this->checkRange($mail, 5, 150, '/?c=home');
            $this->checkRange($firstname, 2, 150, '/?c=home');
            $this->checkRange($lastname, 2, 150, '/?c=home');
            $this->checkRange($password, 7, 70, '/?c=home');
            $this->checkRange($phoneNumber, 10, 10, '/?c=home');
            $this->checkRange($adress, 5, 150, '/?c=home');
            $this->checkRange($city, 5, 155, '/?c=home');
            $this->checkRange($postalCode, 5, 55, '/?c=home');


            $user = (new User())
                ->setEmail($mail)
                ->setFirstname($firstname)
                ->setLastname($lastname)
                ->setPassword($password)
                ->setPhoneNumber($phoneNumber)
                ->setAddress($adress)
                ->setCity($city)
                ->setCodePostal($postalCode)
                ->setRole(1)
            ;

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                header("Location: /?c=home");
            }

            if (UserManager::mailExists($mail)) {
                header("Location: /?c=home");
            }

            if (UserManager::addUser($user)) {
                header("Location: /index.php?c=user&f=0");
            }
        }
}