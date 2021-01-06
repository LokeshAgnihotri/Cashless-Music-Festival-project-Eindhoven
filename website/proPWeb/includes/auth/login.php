<?php
require_once '../session.php';
require_once '../dbconnect.php';

if (isset($_POST['login-btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $SQLQuery = "SELECT * FROM users WHERE email = :email";
        $statement = $conn->prepare($SQLQuery); //prepare connection
        $statement->execute(array(':email' => $email));

        while ($row = $statement->fetch()) {
            //get the following the data from database
            $_SESSION["user_is_logged_in"] = true;
            $id = $row['user_id'];
            $email = $row['email'];
            $hashed_password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

// whether password and hast password (confirm password) are the same or not
            if (password_verify($password, $hashed_password)) {
                $_SESSION["user_is_logged_in"] = true;
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                echo "login succesully";
                header('location: ../../index.php');
            } else {
                echo "Error: Invalid username or password";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // print out the error msg
    }
}

//
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_array($result)) {
//         if (password_verify($password, $row["password"])) {
//             $_SESSION["user_is_logged_in"] = true;
//             $_SESSION["user_firstname"] = $row["first_name"];
//             $_SESSION["user_lastname"] = $row["last_name"];
//             $_SESSION["user_email"] = $row["email"];

//             $userIDCookie = "userID";
//             $userID = $row["id"];
//             setcookie($userIDCookie, $userID, time() + (86400 * 30), "/");

//             echo 'ok';
//         }
//     }
// } else {
//     echo 'No';
// }
