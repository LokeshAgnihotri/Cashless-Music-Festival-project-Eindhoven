<?php

// $servername = "studmysql01.fhict.local";
// $username = "dbi395367";
// $password = "Fontys@123!";
// $dbname = "dbi395367";
// $dsn = "mysql:dbname=$dbname;host=$servername";

// try {
//     $conn = new PDO($dsn, $username, $password); // connecting to database
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error handeling
//     // echo "connection is made successfully";

// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage(); // catching the error
// }

//Fadi account

$servername = "studmysql01.fhict.local";
$username = "dbi412627";
$password = "wolf2019";
$dbname = "dbi412627";
$dsn = "mysql:dbname=$dbname;host=$servername";

$error = " ";

try {
    $conn = new PDO($dsn, $username, $password); // connecting to database
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error handeling
    // echo "connection is made successfully";

} catch (PDOException $e) {
    $error = "Error: " . $e->getMessage(); // catching the error
}
