<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // reCAPTCHA verification
    $recaptchaSecret = '6Lf6mk0rAAAAAM6qjnalQOcJjyIQavPRdzy5CWlN';
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    if (empty($recaptchaResponse)) {
        header('Location: /G3B/contact-us.html?status=captcha_missing');
        exit();
    }

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $captchaSuccess = json_decode($verify);

    if (!$captchaSuccess->success) {
        header('Location: /G3B/contact-us.html?status=captcha_failed');
        exit();
    }

    // Get and sanitize form input
    $first_name = sanitizeInput($_POST['first_name']);
    $last_name = sanitizeInput($_POST['last_name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $destination = sanitizeInput($_POST['destination']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);

    if (!isValidEmail($email)) {
        header('Location: /G3B/contact-us.html?status=invalidemail');
        exit();
    }

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->Debugoutput = 'html';

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'npriyanagendran2000@gmail.com';
        $mail->Password = 'epyvwpjqtmnfrzhf'; // Use App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('npriyanagendran2000@gmail.com', 'G3B Website');
        $mail->addAddress('admissions.g3beducation@gmail.com', 'G3B Admissions');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission: ' . $subject;
        $mail->Body = "
            <h2>Contact Form Details</h2>
            <p><strong>Name:</strong> {$first_name} {$last_name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Destination:</strong> {$destination}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        header('Location: /G3B/contact-us.html?status=success');
        exit();
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        header('Location: /G3B/contact-us.html?status=error');
        exit();
    }
} else {
    header('Location: /G3B/contact-us.html');
    exit();
}