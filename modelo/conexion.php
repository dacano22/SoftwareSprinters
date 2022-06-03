<?php

$servername = "localhost";
$port = 3306;
$username = "root";
$password = "";
$db = "schedule";

try {
    $conn = new PDO("mysql:host=$servername; port=$port; dbname=$db", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>