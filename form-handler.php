<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['msg'] ?? '';

    $to = "leads@desirableconstruction.com"; // Your receiving email address
    $email_subject = "Contact Form: $subject";
    $email_body = "You have received a new message:\n\n"
                . "Name: $name\n"
                . "Email: $email\n"
                . "Phone: $phone\n"
                . "Subject: $subject\n"
                . "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message could not be sent.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "405 - Method Not Allowed";
}
?>
