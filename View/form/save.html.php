<?php
session_start();

$name = trim(strip_tags($_POST['name']));
$message = trim(strip_tags($_POST['message']));
$userMail = trim(strip_tags($_POST['mail']));

if (isset($_POST['mail'])) {
    $to = 'dehainaut.angelique@orange.fr';
    $subject = "Vous avez un message";
    $headers = array(
        'Reply-to' => $userMail,
        'X-Mailer' => 'PHP/' . phpversion()
    );
    if (filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
        if (strlen($message <= 250)) {
            if (mail($to, $subject, $message, $headers, $userMail)) {
                $_SESSION['mail'] = "mail-success";
            } else {
                $_SESSION['mail'] = "mail-error";
            }
        }
    }
}

header('Location: /?form&a=contact');