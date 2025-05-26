<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Composer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['msg'] ?? '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'leads@desirableconstruction.com';
        $mail->Password   = 'bvjt hxxm pupt iuic';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('leads@desirableconstruction.com', 'Desirable Construction');
        $mail->addAddress('leads@desirableconstruction.com');

        $mail->Subject = "Contact Form: $subject";
        $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

        $mail->send();
        echo 'Message sent successfully.';
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    http_response_code(405);
    echo "405 - Method Not Allowed";
}
?>

