 <?php
try {

    $access = new pdo("mysql:host=localhost;dbname=eshop;charset=utf8", "root", "");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    $e->getMessage();
}


// $host = 'localhost';
//     $dbname = 'eshop';
// $username = 'root';
// $password = '';

// $connection = mysqli_connect($host, $username, $password, $dbname);

// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// mysqli_set_charset($connection, "utf8");

// // Set error reporting to display warnings
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
 