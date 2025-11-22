<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $visitor_email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!$visitor_email) {
        die("Invalid email");
    }

    $email_from = "no-reply@seudominio.com"; // coloque o seu domínio!
    $to = "casseb.phcc@gmail.com";
    
    $email_subject = "New form submission";

    $email_body = "User name: $name\n".
                  "User email: $visitor_email\n".
                  "Subject: $subject\n".
                  "User message: $message\n";

    $headers  = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($to, $email_subject, $email_body, $headers);

    header("Location: contact.html");
    exit();
}

?>
