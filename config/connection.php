<?php
try {
    $host = 'localhost';
    $dbname = 'darna';
    $username = 'root';
    $passworddb = '';
    global $access;
    $access = new pdo("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $passworddb);
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    echo "There was an error! " . $e->getMessage();
}

// $host = 'localhost';
//     $dbname = 'eshop';
// $username = 'root';
// $passworddb = '';

// $connection = mysqli_connect($host, $username, $passworddb, $dbname);

// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// mysqli_set_charset($connection, "utf8");

// // Set error reporting to display warnings
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



?>
