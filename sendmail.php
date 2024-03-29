<?php
use PHPMailer\PHPMailer;
use PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail-> setFrom('leo-sibiryakov@yandex.ru', 'Леонид');
$mail-> addAddress('leo-sibiryakov@yandex.ru');
$mail-> Subject = 'Здравствуйте, я по вакансии HTML-верстальщика';

$body = '<h1>Добрый день.</h1>';

if(trim(!empty($_POST['name']))) {
    $body.='<p><stromg>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))) {
    $body.='<p><stromg>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))) {
    $body.='<p><stromg>Сообщение:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>