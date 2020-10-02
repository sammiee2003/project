<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
$host = '127.0.0.1:3306';
$db   = 'LoginSystem';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $con = mysqli_connect("localhost","root","","LoginSystem");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

    