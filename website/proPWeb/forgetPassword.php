<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';
// Load Composer's autoloader
require 'php mailer/vendor/autoload.php';
require './includes/db.php';

$error = "";
$msg = "";

// Send e-mail to user

// // Import PHPMailer classes into the global namespace
// // These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
//
// // Load Composer's autoloader
// require 'php mailer/vendor/autoload.php';

if (isset($POST["email"])) {

    $emailTo = $_POST("email");

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetPasswords(code,email) VALUES('$code, '$emailTo')");
    if (!$query) {
        exit("Error: could not generate code!");
    }
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'olala.entertaintment@gmail.com'; // SMTP username
        $mail->Password = 'Wolf@2019'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients

        $mail->setFrom('olala.entertaintment@gmail.com', 'Olala Entertaiment');
        $mail->addAddress($emailTo); // Add a recipient
        $mail->addReplyTo('no-reply@olala.com', 'Information');

        // $body = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';
        // $greatings = '<strong>Hello  ' . $lastname . ', </strong>';
        // $url="HTTP://". $_SERVER["HTTO_POST"]. dirname($_SERVER["PHP_SELF"]). "resetPassword.php?code=$code";
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Thank you for your purchase';
        $mail->Body = 'this is test';

        $mail->AltBody = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';

        $mail->send();
        $msg = ' resit password has been sent';
        echo ' resit password has been sent';
    } catch (Exception $e) {
        $error = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo ' resit password has been not sent';
    }
    exit();

}

?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Olala reset password</title>
    <link href="assets/css/forgetPassword.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">


</head>

  <body>
    <div class="forget">

        <form method= "POST">

            <h2 align="center" style="color:#fff;">Forget password</h2>
            <h5 style="font-size:12px; color:aliceblue;">Enter email here that you used on your account.We send link on
                your email to reset your password.</h5>
            <input type="text" name="email" placeholder="Enter your email" autocomplete="off"/><br /><br />
            <input type="button" name="submit " value="Send" onclick="myFunction()" /><br /><br /><br /><br />
            <a href="index.php" style="text-decoration:none;">Go back to Home page</a><br /><br />

            <div id="msg"> <?php echo $error ?></div>


        </form>
    </div>
            </body>
            <script>
                function myFunction() {
                    var x = document.getElementById("msg");
                    x.className = "show";
                    setTimeout(function () {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                }
            </script>
            </html>
