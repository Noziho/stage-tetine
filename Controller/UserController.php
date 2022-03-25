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
            header("Location: /?c=home&f=999999");
        }

            $mail = trim(filter_var($_POST['mail'], FILTER_SANITIZE_STRING));
            $firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
            $lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
            $phoneNumber = trim(filter_var($_POST['phone-number'], FILTER_SANITIZE_NUMBER_INT));
            $phoneNumber = (int)$phoneNumber;
            $adress = trim(filter_var($_POST['adress'], FILTER_SANITIZE_STRING));
            $city = trim(filter_var($_POST['city'], FILTER_SANITIZE_STRING));
            $postalCode = trim(filter_var($_POST['postal-code'], FILTER_SANITIZE_STRING));


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
                header("Location: /?c=home&f=1221");
            }

            if (UserManager::mailExists($mail)) {
                header("Location: /?c=home&f=14444");
            }

            if (UserManager::addUser($user)) {
                header("Location: /index.php?c=user&a=login");
            }
        }

        public function login () {
            if (isset($_POST['submit'])) {
                if (!$this->formIsset('mail', 'password')) {
                    header("Location: /?home&f=1");
                }

                $mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
                $password = $_POST['password'];

                UserManager::login($mail, $password);
            }

            $this->render('user/login');

        }

        public function disconnect():void
        {
            $_SESSION['user'] = null;
            session_unset();
            session_destroy();
            $this->render('home/home');
        }
}