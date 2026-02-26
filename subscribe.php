<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Honeypot spam check
    if (!empty($_POST['website'])) {
        exit();
    }

    // Sanitize email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = "Qigonginthemidlands@gmail.com";
        $subject = "New Subscriber - Qigong in the Midlands";
        $message = "New subscriber email: " . $email;

        $headers = "From: website@qigonginthemidlands.com\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        mail($to, $subject, $message, $headers);

        // Redirect to thank you page
        header("Location: thankyou.html");
        exit();

    } else {
        echo "Invalid email address.";
    }
}
?>