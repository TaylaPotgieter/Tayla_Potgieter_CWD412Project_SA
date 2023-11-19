<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Check if the email is provided in the POST data
if (isset($_POST['email'])) {
    // Get the sender's email from the form and sanitize it
    $senderEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'taylapotgieterctu@gmail.com'; // Your Gmail address
            $mail->Password   = 'Shadowtiger1!'; // Your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom($senderEmail, 'Sender Name');
            $mail->addAddress('taylapotgieterctu@gmail.com', 'Recipient Name');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Subject';
            $mail->Body    = 'Message';

            // Send the email
            if ($mail->send()) {
                echo 'Message has been sent';
            } else {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ' . $e->getMessage();
        }
    } else {
        echo 'Invalid email address';
    }
} else {
    echo 'Email address not provided';
}
?>
