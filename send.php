<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'npriyanagendran2000@gmail.com';
        $mail->Password = 'legumuutcohtrxmn';   // Your App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Get form values
        $firstName = isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '';
        $lastName = isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
        $destination = isset($_POST['destination']) ? htmlspecialchars($_POST['destination']) : '';
        $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
        $message = isset($_POST['message']) ? nl2br(htmlspecialchars($_POST['message'])) : '';

        // ✅ Define fullName before using it
        $fullName = trim($firstName . ' ' . $lastName);

        // Sender and recipient
        $mail->setFrom($email, $fullName);
        $mail->addAddress('admissions.g3beducation@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h3>Contact Form Submission Details</h3>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Destination:</strong> $destination</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        ";
        $mail->send();
        echo "<script>
    alert('Message sent successfully!');
    const page = localStorage.getItem('currentpage');
    if (page) {
        window.location.href = page;
    }
</script>";
    } catch (Exception $e) {
        echo "<script>
            alert('Mail could not be sent. Error: {$mail->ErrorInfo}');
            window.history.back();
        </script>";
    }
} else {
    echo "This page is intended to handle form submissions only.";
    exit;
}
