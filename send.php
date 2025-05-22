<?php
if (isset($_POST['submit'])) {

    // Google reCAPTCHA API keys settings
    $secretKey = '6LfQdAErAAAAAKElF0bB0suAWzLT7-6bXgLBAaAO';

    // Validate reCAPTCHA checkbox
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

        // Verify the reCAPTCHA API response
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);

        // Decode JSON data of API response
        $responseData = json_decode($verifyResponse);

        if ($responseData->success) {

            $to = 'admissions.g3beducation@gmail.com';
            $subject = 'Contact Us - Form Enquiry';

            // Build email content
            $data = '<table border="1" bordercolor="#ccc" align="center" width="650" style="width:650px;" cellpadding="10" cellspacing="0">';
            $data .= '<tr><td colspan="2" align="center" style="font-weight: bolder;font-size: 16px">Contact Us Enquiry Details</td></tr>';
            $data .= '<tr><td>Name:</td><td>' . htmlspecialchars($_POST['name']) . '</td></tr>';
            $data .= '<tr><td>Email ID:</td><td>' . htmlspecialchars($_POST['email']) . '</td></tr>';
            $data .= '<tr><td>Phone No:</td><td>' . htmlspecialchars($_POST['mobile']) . '</td></tr>';
            $data .= '<tr><td>Subject:</td><td>' . htmlspecialchars($_POST['subject']) . '</td></tr>';
            $data .= '<tr><td>Message:</td><td>' . htmlspecialchars($_POST['message']) . '</td></tr>';
            $data .= '<tr><td>IP Address:</td><td>' . $_SERVER['REMOTE_ADDR'] . '</td></tr>';
            $data .= '</table>';

            $message = $data;

            // Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Contact Us <no-reply@g3beducation.com>' . "\r\n";

            // Send email
            if (mail($to, $subject, $message, $headers)) {
                header('Location: thank-you.php');
                exit();
            } else {
                header('Location: failed.php');
                exit();
            }
        } else {
            // Redirect in case of reCAPTCHA failure
            header('Location: captcha-failed.php');
            exit();
        }
    } else {
        // Redirect if reCAPTCHA response is not set
        header('Location: captcha-missing.php');
        exit();
    }
} else {
    // Redirect if the form was not submitted
    header('Location: form-error.php');
    exit();
}
?>
