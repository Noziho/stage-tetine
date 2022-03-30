<?php
session_start();

$files = json_decode(file_get_contents('../data/last_message.json'));
$name = trim(strip_tags($_POST['name']));
$message = trim(strip_tags($_POST['message']));
$userMail = trim(strip_tags($_POST['mail']));

if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['message'])) {
    $files[] = [$name,$message];
}
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

$jsonMessage = file_put_contents("../data/last_message.json", json_encode($files));

header('Location: /?c=form&a=contact');