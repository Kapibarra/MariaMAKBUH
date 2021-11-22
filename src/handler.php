<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/PHPMailer-5.2.28/src/Exception.php';
require 'php/PHPMailer-5.2.28/src/PHPMailer.php';
require 'php/PHPMailer-5.2.28/src/SMTP.php';

$mail = new PHPMailer(true);
$mail_subject = 'Заявка с сайта makbuh.ru';
$mail_to_email = 'direct-makbuh@yandex.ru'; // your email
$mail_to_name = 'makbuh.ru';

try {

	$mail_from_email = isset( $_POST['email'] ) ? $_POST['email'] : '';
	$mail_from_phone = isset( $_POST['phone'] ) ? $_POST['phone'] : '';
	$mail_category1 = isset( $_POST['category1'] ) ? $_POST['category1'] : '';
	$mail_category2 = isset( $_POST['category2'] ) ? $_POST['category2'] : '';
	$mail_category3 = isset( $_POST['category3'] ) ? $_POST['category3'] : '';
	

	// Server settings
	$mail->isSMTP(); // Send using SMTP
	$mail->Host = 'smtp.yandex.com'; // Set the SMTP server to send through
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = 'noviweb@yandex.ru'; // SMTP username
	$mail->Password = 'cf911313'; // SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$mail->Port = 465; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	$mail->setFrom($mail->Username, 'Makbuh.ru'); // Your email
	$mail->addAddress($mail_to_email, $mail_to_name); // Add a recipient на какой емейл отправить!! проверить!!!!

	for($ct=0; $ct<count($_FILES['file_attach']['tmp_name']); $ct++) {
		$mail->AddAttachment($_FILES['file_attach']['tmp_name'][$ct], $_FILES['file_attach']['name'][$ct]);
	}

	// Content
	$mail->isHTML(true); // Set email format to HTML

	$mail->Subject = $mail_subject;
	$mail->Body = '
		<strong>Форма:</strong> ' . $mail_category1 . '<br>
		<strong>Система налооблажения:</strong> ' . $mail_category2 . '<br>
		<strong>Сфера:</strong> ' . $mail_category3 . '<br>
		<strong>Телефон:</strong> ' . $mail_from_phone . '<br>
		<strong>Email:</strong> ' . $mail_from_email; 
	$mail->Send();

	echo 'Message has been sent';

} catch (Exception $e) {

	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}