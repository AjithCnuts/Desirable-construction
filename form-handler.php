<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['msg'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'leads@desirableconstruction.com'; // Your Gmail or Google Workspace
        $mail->Password   = 'bvjt hxxm pupt iuic';             // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipients
        $mail->setFrom('leads@desirableconstruction.com', 'Website Contact');
        $mail->addAddress('leads@desirableconstruction.com'); // Receiving email
        $mail->addReplyTo($email, $name); // User's email for replies

        // Content
        $mail->isHTML(false);
        $mail->Subject = "Contact Form: $subject";
        $mail->Body    = "You have received a new message:\n\n"
                       . "Name: $name\n"
                       . "Email: $email\n"
                       . "Phone: $phone\n"
                       . "Subject: $subject\n"
                       . "Message:\n$message";

        $mail->send();
        echo 'Message sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    http_response_code(405);
    echo "405 - Method Not Allowed";
}

