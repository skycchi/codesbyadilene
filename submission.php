<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up the email
    $to = "a@adilene.net";
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\n$message";

    // Send the email
    if (mail($to, $subject, $body)) {
        echo "Submission successfully sent!";
        exit;
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
