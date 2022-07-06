<?php

namespace App\Controller;

use App\Model\Entity\User;
use App\Model\Manager\UserManager;

class UserController extends AbstractController
{

    public function index()
    {
        $this->render('home/home');
    }

    public function register()
    {
        $this->render('user/register');

        if (isset($_POST['submit'])) {
            if (!$this->formIsset
            ('mail', 'firstname', 'lastname', 'password', 'password-repeat',
                'phone-number', 'adress', 'city', 'postal-code')) {
                header("Location: /?c=user&f=1");
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
                ->setRole(1);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                header("Location: /?c=user&f=2");
            }

            if (UserManager::mailExists($mail)) {
                header("Location: /?c=home&f=3");
            }

            if (UserManager::addUser($user)) {
                self::login();
            }

        }

    }

    public function login()
    {
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

    public function disconnect(): void
    {
        $_SESSION['user'] = null;
        session_unset();
        session_destroy();
        $this->render('home/home');
    }

    /**
     * @param int $id
     * @return void
     */
    public function showUser(int $id = null)
    {
        if (null === $id) {
            header('Location: /index.php?c=home');
        }

        if ($_SESSION['user']->getId() !== $id) {
            header("Location: /?c=home");
            exit();
        }

        $this->render('user/profile', [
            'profile' => UserManager::getUserById($id)
        ]);
    }

    public function editUser(int $id)
    {
        if (isset($_POST['submit'])) {
            $user = $_SESSION['user'];
            /* @var User $user */
            $id = $user->getId();
            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $phone = filter_var($_POST['phone-number'], FILTER_SANITIZE_NUMBER_INT);
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $postal = filter_var($_POST['postal-code'], FILTER_SANITIZE_STRING);
            $address = filter_var($_POST['adress'], FILTER_SANITIZE_STRING);

            UserManager::editUser($id, $firstname, $lastname, $email, $phone, $city, $postal, $address);
            $this->render('user/profile', [
                'profile' => UserManager::getUserById($id)
            ]);
        }
    }

    public function deleteUser(int $id)
    {
        if (UserManager::userExists($id)) {
            $user = UserManager::getUserById($id);
            $deleted = UserManager::deleteUser($user);
        }
        self::disconnect();
        $this->index();

    }

    //TODO: Check if it works
    public function contactUs()
    {
        if (isset($_POST['mail'])) {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            $userMail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);

            $to = 'dehainaut.angelique@orange.fr';
            $subject = "Vous avez un message";
            $headers = array(
                'Reply-to' => $userMail,
                'X-Mailer' => 'PHP/' . phpversion()
            );
            if (filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
                if (strlen($message) >= 20 && strlen($message) <= 250) {
                    if (mail($to, $subject, $message, $headers, $userMail)) {
                        $_SESSION['mail'] = "mail-success";
                    } else {
                        $_SESSION['mail'] = "mail-error";
                    }
                    header('Location: /?c=user&a=contact-us');
                }
            }
        } else {
            $this->render('about/contact');
        }
    }

    public function confidentiality () {
        $this->render('about/confidentiality');
    }
}