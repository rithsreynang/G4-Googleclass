<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$id = $_GET["classroom_id"];
$url = '../../views/teach/send.email.invite/join.view.email.php?classroom_id=' . $id;
require_once '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'senghak.chhun@student.passerellsenumeriques.org';
            $mail->Password   = 'cpfm pjlh yihy wlqu';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('senghak.chhun@student.passerellsenumeriques.org', 'ET HERO');
            $mail->addAddress($email, 'THEUN ET');

            $mail->isHTML(true);
            $mail->Subject = 'JOIN ClASSROOM';
            $mail->Body    = "Welcome to the ClASSROOM";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            // Email sent successfully, show alert message
            echo "<script>alert('Email sent successfully.');</script>";
            header("location: ../../views/teach/people.view.php?classroom_id=$id");
            exit();
        } catch (Exception $e) {
            echo "Message couldn't be sent to the client. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
