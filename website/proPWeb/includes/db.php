<?php

if ($_SERVER["SERVER_ADDR"] == '192.168.64.2') {
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "wolftechdb";
// Remote Host
} else {
    $servername = "studmysql01.fhict.local";
    $username = "dbi412627";
    $password_db = "wolf2019";
    $dbname = "dbi412627";
}

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    echo "failed to connect: " . mysqli_connect_errno();
    die("Connection failed: " . $conn->connect_error);
}
