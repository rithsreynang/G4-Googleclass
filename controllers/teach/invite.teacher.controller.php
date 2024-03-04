<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require '../../vendor/autoload.php';
// Get values from input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();                                      // Send using SMTP
            $mail->Host       = 'live.smtp.mailtrap.io';                 // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                             // Enable SMTP authentication
            $mail->Username   = 'senghak.chhun@student.passerellesnumeriques.org';           // SMTP username (your Gmail address)
            $mail->Password   = '#963955091';                    // SMTP password (your Gmail password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable implicit TLS encryption
            $mail->Port       = 465;                              // TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

            // Recipients
            $mail->setFrom('E-Classroom@gmail.com', 'Your hetol');
            $mail->addAddress($email, 'Me');             // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been send successfully';
        } catch (Exception $e) {
            echo "Message couldn't sent to client. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
