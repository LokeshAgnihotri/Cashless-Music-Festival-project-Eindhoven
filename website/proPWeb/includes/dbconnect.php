
<!-- we dont use this connection further. we use db.phpconecction -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wolftechdb";
$dsn = "mysql:host=$servername; dbname=$dbname";

try {
    $conn = new PDO($dsn, $username, $password); // connecting to database
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error handeling
    // echo "connection is made successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); // catching the error
}
