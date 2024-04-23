<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "a@adilene.net";
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\n$message";
    $headers = "From: adilene <a@adilene.net>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="https://files.catbox.moe/3rq9fx.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>submission</title>
        <link href="/style.css" rel="stylesheet" type="text/css" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@500&display=swap" rel="stylesheet">
    </head>
    <body style="background-color:white;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;min-height:100vh;">
        <?php
            
            if (mail($to, $subject, $body, $headers)) {
                echo "<h1>success</h1>";
                echo "submission successfully sent!";
                echo "<br><br>redirecting you back to the main page...";
                header("refresh:5;url=index.html");
                exit;
            } else {
                echo "<h1>failure</h1>";
                echo "something went wrong. please try again later.";
                echo "<br><br>redirecting you back to the main page...";
                header("refresh:5;url=index.html");
                exit;
            }
        
        ?>
    </body>
</html>