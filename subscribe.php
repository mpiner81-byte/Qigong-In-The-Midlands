<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Honeypot spam check (hidden field)
    if (!empty($_POST['website'])) {
        exit(); // Stop if bot detected
    }

    // Sanitize the email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = "qigonginthemidlands@gmail.com";
        $subject = "New Subscriber - Qigong in the Midlands";
        $message = "New subscriber email: " . $email;

        // Set headers
        $headers = "From: Qigong Website <qigonginthemidlands@gmail.com>\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        mail($to, $subject, $message, $headers);

        // Redirect to thank you page
        header("Location: thankyou.html");
        exit();

    } else {
        // Invalid email
        echo "Invalid email address. Please go back and try again.";
    }
}
?>
