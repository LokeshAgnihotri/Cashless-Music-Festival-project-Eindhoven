<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Load Composer's autoloader
require 'php mailer/vendor/autoload.php';
require 'includes/db.php';

$userEmail = "";

if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = $_SERVER['HTTP_HOST'] . "/proP%20website/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    echo $url;
    //expires time for token
    $expires = date("U") + 1800;

    // fetch data from database
    $userEmail = $_POST['email'];
    $sqlEmailIsInDB = "SELECT * FROM users WHERE email='$userEmail'";
    $emailInDBResult = $conn->query($sqlEmailIsInDB);

    if ($emailInDBResult->num_rows > 0) {
        // delete any existing enteries of token inside the database from this specific user if any aviable
        $sqlDeleteToken = "DELETE FROM  pwdReset WHERE pwdResetEmail=?";
        // initialize the connection
        $stmt = mysqli_stmt_init($conn);
        //prepare statment for email
        if (!mysqli_stmt_prepare($stmt, $sqlDeleteToken)) {
            echo "there was an error";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sqlInsertPassword = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";

        $stmt = mysqli_stmt_init($conn);
        //prepare statment for email
        if (!mysqli_stmt_prepare($stmt, $sqlInsertPassword)) {
            echo "there was an error";
            exit();
        } else {
            // hashing the token for security purpose
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            // $hashedToken = bin2hex($token);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn); // closing connection myQli does it acctuallly but i do it expilict

        // SEND MAIL

        try {
            $mail = new PHPMailer(true);
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            // $mail->isSMTP(); // Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->Mailer = 'smtp';
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'obaid.ghafoori9@gmail.com'; // SMTP username
            $mail->Password = 'Mcit"1234'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients

            $mail->setFrom('olala.entertaintment@gmail.com', 'Olala Entertaiment');
            $mail->addAddress($userEmail, 'Obaid'); // Add a recipient

            $mail->addReplyTo('no-reply@olala.com', 'Information');

            // $body = '<p> <strong> Hello </strong> <br> Thank you for the purchase </p>';
            $greatings = '<strong>Hello, </strong>';
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Reset your password for Olala Entertaintment';
            $mail->Body = $greatings . '
            <p> we received a password reset request. The Link to reset the password,
            if you did not  make this request, you can ignor this email</p>
            <p> Here is your password reset LINK: </p>
            <a href="' . $url . '">' . $url . '</a>';
            $mail->AltBody = 'Thank you';
            $mail->send();

            $msg = 'Password reset request is sent to your e-mail address.';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "This email address is NOT in database";
    }
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <h2 style="color:#fff;">Reset password</h2>

            <h5 style="font-size:12px;font-family:raleway; color:aliceblue;">Enter email here that you used on your
                account.We send link on your email to reset your password.</h5>

            <input type="text" name="email" required placeholder="Enter your email" autocomplete="off"
                value="obaid.ghafoori9@gmail.com" required /><br /><br />

            <!-- <input type="button" name="reset-request-submit" value="Recieve new password by email" onclick="myFunction()" /><br /> <br> -->

            <button type="submit" name="reset-request-submit" onclick="myFunction()">Recieve new password by
                email</button><br /><br /><br /><br />

            <a href="index.php" style="text-decoration:none;">Go back to Home page</a><br /><br />

            <?php if (isset($msg)) {echo $msg;}?>

            <!-- <div id="msg"> <?php if (isset($error)) {echo $error;}?></div> -->

            <!-- <?php if (isset($_GET["reset"])) {if ($_GET["reset"] == "success") {echo '<p Style="color:green"> Check Your email </p>';}}?> -->
            <!-- <p id="msg" type="hidden"> an email with requested rest password has been successfully sent -> fake</p> -->
        </form>
        <!-- <?php if (isset($_GET["reset"])) {if ($_GET["reset"] == "success") {echo '<p Style="color:green"> Check Your email </p>';}}?> -->
    </div>
</body>
<script>
// function myFunction() {
//     var x = document.getElementById("msg");
//     x.className = "show";
//     setTimeout(function () {  x.className = x.className.replace("show", "blbla");  }, 4000);
// }
</script>

</html>