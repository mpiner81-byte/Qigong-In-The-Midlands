```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Honeypot spam check
    if (!empty($_POST['website'])) {
        exit();
    }

    // Sanitize subscriber email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        /* ===============================
           EMAIL #1 — Send notification to Lee
        =============================== */

        $studio_email = "qigonginthemidlands@gmail.com";

        $subject1 = "New Subscriber - Qigong in the Midlands";
        $message1 = "New subscriber joined the mailing list.\n\n";
        $message1 .= "Subscriber Email: " . $email;

        $headers1 = "From: Qigong Website <qigonginthemidlands@gmail.com>\r\n";
        $headers1 .= "Content-Type: text/plain; charset=UTF-8\r\n";

        mail($studio_email, $subject1, $message1, $headers1);


        /* ===============================
           EMAIL #2 — Welcome email to subscriber
        =============================== */

        $subject2 = "Welcome to Qigong in the Midlands";
        $message2 = "Thank you for subscribing!\n\n";
        $message2 .= "You will receive updates about classes and workshops.\n\n";
        $message2 .= "View the class calendar here:\n";
        $message2 .= "https://qigonginthemidlands.com/calendar\n\n";
        $message2 .= "— Qigong in the Midlands";

        $headers2 = "From: Qigong in the Midlands <qigonginthemidlands@gmail.com>\r\n";
        $headers2 .= "Content-Type: text/plain; charset=UTF-8\r\n";

        mail($email, $subject2, $message2, $headers2);


        /* ===============================
           Redirect to thank you page
        =============================== */

        header("Location: thankyou.html");
        exit();

    } else {
        echo "Invalid email address.";
    }
}
?>
```
