<?php

$selector = "";
$validator = "";

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    $currentDate = date("U");

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: create-new-password.php?newpwd=empty");
        exit();

    } else if ($password != $passwordRepeat) {
        header("Location: create-new-password.php?newpwd=pwdnotsame");
        exit();
    }
    //check  for token expration
    $currentDate = date("U");

    require 'includes/db.php';

    echo 'selector=>' . $selector . '<br/>';
    echo 'validator=>' . $validator . '<br/>';

    //selecting token from inside database
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?";
    $stmt = mysqli_stmt_init($conn);
    echo $sql;
    //  echo $stmt;
    //prepare statment for email -->
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            echo 'error executing statement';
        }

        if (!$row = mysqli_fetch_assoc($result)) {

            echo "you need to re-submit your reset request.";
            exit();
        } else {
            $tokenBin = bin2hex($validator);
            echo 'error executing statement';
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            echo '$tokenCheck';
            echo $validator . '<br/>';
            echo $tokenBin;

            if ($tokenCheck === false) {
                echo "you need to re-submit your reset request.";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email=?;";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "there was an error";
                    exit();

                } else {

                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {

                        echo "There was an error!";
                        exit();
                    } else {
                        $sqlUpdatePassword = "UPDATE users SET password=? WHERE email=?";

                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sqlUpdatePassword)) {
                            echo "there was an error";
                            exit();

                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            // delete token that belongs to same email user  -->
                            $sql = "DELETE FROM pwdRest WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "there was an error";
                                exit();

                            } else {

                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                header("Loation: modals/login.modal.php?newpwd=passwordupdated");
                            }
                        }

                    }

                }
            }
        }
    }
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Olala reset password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">


</head>

<body>
    <!-- // if the token is inside url available -->
    <div class="Wrapper-main">
        <section class="section-default">
            <?php
$selector = $_GET["selector"];
$validator = $_GET["validator"];
if (empty($selector) || empty($validator)) {echo "Could not validate your request! ";} else {if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
    ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">

                <input type="password" name="pwd" placeholder="Enter your password .. ">
                <input type="password" name="pwd-repeat" placeholder="repeate new  password .. ">

                <button type="submit" name="reset-password-submit"> Reset password</button>
            </form>
            <?php
}
}
?>
        </section>
    </div>
</body>

</html>