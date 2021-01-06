<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'php mailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'olala.entertaintment@gmail.com'; // SMTP username
    $mail->Password = 'Wolf@2019'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to

    // dynomict use

    // dynomic use ends here

    //Recipients

    $mail->setFrom('olala.entertaintment@gmail.com', 'Olala Entertaiment');
    $mail->addAddress('obaid.ghafoori9@gmail.com', 'Obaid'); // Add a recipient

    // $mail->addReplyTo('no-reply@olala.com', 'Information');

    // $body = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Thank you for your purchase';
    $mail->Body = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';
    $mail->AltBody = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';

    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
