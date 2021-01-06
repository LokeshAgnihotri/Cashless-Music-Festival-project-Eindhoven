<?php

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();

    } else if ($password != $passwordRepeat) {
        header("Location: ../create-new-password.php?newpwd=pwdnotsame");
        exit();
    }
    //check  for token expration
    $currentDate = date("U");

    require 'db.php';

    //selecting token from inside database
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?";
    $stmt = mysqli_stmt_init($conn);
    //prepare statment for email -->
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there was an error";
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {

            echo "you need to re-submit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

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
                        $sql = "UPDATE users SET password=? WHERE email=?";

                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
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

} else {
    header("Location:../index.php");
}