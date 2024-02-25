<?php

//database_connection.php

session_start();

$connect = new PDO("mysql:host=localhost; dbname=pwc_db", "root", "");

// $connect = new PDO("mysql:host=localhost:3306; dbname=pwc_db", "admin_pwc", "s63pv7I@1");
// $connect->exec("set names utf8mb4");


?>
