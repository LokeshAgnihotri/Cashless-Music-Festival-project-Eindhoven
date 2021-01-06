<?php

require_once '../dbconnect.php';

if (isset($_POST['submit'])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $passwordRepeat = $_POST["pass-repeat"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $dob = $_POST["dob"];
    $barcode = $_POST["barcode"];
    $rfid = $_post["rfid"];

    try {

        $SQLInsert = "INSERT INTO users (firstname, lastname, email,  password, dob, barcode,rfid)
             VALUE( :firstname, :lastname, :email, :password, :dob,:barcode,:rfid)";

        $statement = $conn->prepare($SQLInsert);
        $statement->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email,
            ':password' => $password, ':dob' => $dob, ':barcode' => $barcode, ':rfid' => $rfid));

        if ($statement->rowCount() == 1) {
            header('location: ../../index.php');
            echo "connection is made and data input is successfully";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
// if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($dob)) {
//     // $firstNameErr = "Name is required";
//     header("Location: ../signup.modal.php?error=emptyfields&uid=" . $firstname . $lastname . "&email=" . $email);
//     exit();

// } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/ˆ[a-zA-Z0-9]*$/", $firstname)) {

//     header("Location: ../signup.modal.php?error=invalidmailuid");
//     exit();
// } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

//     header("Location: ../signup.modal.php?error=invalidmail&uid=" . $firstname . $lastname);
//     exit();

// } else if (!preg_match("/ˆ[a-zA-Z0-9]*$/", $firstname)) {

//     header("Location: ../signup.modal.php?error=invaliduid&mail=" . $email);
//     exit();
// }
