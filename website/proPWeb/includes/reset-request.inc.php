<?php
// require 'includes/db.php';

if (isset($_POST["reset-request-submit"])) {
    echo 'till here i am goooood';
    // issue two token in order to avoid timing attacks from hackers
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://i395367.hera.fhict.nl/includes/modals/forgottenpwd.modal.php/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    //expires time for token
    $expires = date("U") + 1800;

    //db connection
    // require 'dbh.inc.php';
    // require 'db.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wolftechdb";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection
    if (!$conn) {

        die("Connection failed: " . mysqli_connect_error());
    }

    //fetch data from database
    $userEmail = $_POST["email"];

    // delete any existing enteries of token inside the database from this specific user if any aviable
    $sql = " DELETE FROM  pwdReset WHERE pwdResetEmail=?";
    // initialize the connection
    $stmt = mysqli_stmt_init($conn);
    //prepare statment for email
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = " INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    //prepare statment for email
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error";
        exit();
    } else {
        // hashing the token for security purpose
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn); // closing connection myQli does it acctuallly but i do it expilict

    // send email using PHP it is not working in local

    $to = $userEmail;

    $subject = 'Reset your password for Olala Entertaintment';

    $message = '<p> we received a password reset request. The Link to reset the password,
    if you did not  make this request, you can ignor this email</p> ';
    $message .= '<p> Here is your password reset LINK: </br> ';
    $message .= '<a herf=" "' . $url . '" >' . $url . '</a></p>';

    $headers = " From:  olala entertaintment<olala.entertaintment@gmail.com>\r\n";
    $headers .= " Reply-To: olala.entertaintment@gmail.com\r\n";
    $headers .= " Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");

    // php mailer with gmail starts here

    // php mailer with gmail starts here

} else {
    header("Location:../index.php");
}
