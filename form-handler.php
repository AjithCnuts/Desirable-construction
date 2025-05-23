<?php
// Get form values
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$phone   = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['msg'] ?? '';

// Email configuration
$to = "leads@desirableconstruction.com"; // ✅ Set your destination email
$email_subject = "Contact Form: " . $subject;
$email_body = "You have received a new message:\n\n"
            . "Name: $name\n"
            . "Email: $email\n"
            . "Phone: $phone\n"
            . "Subject: $subject\n"
            . "Message:\n$message";

// ✅ Properly set headers
$headers = "From: no-reply@desirableconstruction.com\r\n"; // Use a domain-based address here
$headers .= "Reply-To: $email\r\n";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully.";
} else {
    echo "Message could not be sent.";
}
?>
