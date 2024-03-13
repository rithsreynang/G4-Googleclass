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
            $mail->Subject = 'Class invitation: Join Classroom';
            $mail->Body = '
                <div class="card" style="background:#FFFFF4; width: 80%;">
                    <div class="card-body" style="padding: 10px; color: purple;">
                        <h3 class="card-title" style="text-align: center;">Hello Student!!</h3>
                        <h3 class="card-title" style="text-align: center;">Welcome to my classroom</h3>
                        <p class="card-text text-center">From: ' . "ET Name" . '</p>
                        <p class="card-text text-center">To: ' . $email . '</p>
                        <p class="card-text text-center">Class link: <a href="' . $class_code . '">' . $class_code . '</a></p>
                    </div>
                </div>';
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
