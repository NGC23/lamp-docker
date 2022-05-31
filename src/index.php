<?php
declare(strict_types=1);

error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'Config/Container.php';
require_once 'Config/Routes.php';

// Testing DB Connection here
// $host = "mysql-server";
// $user = "db_user";
// $pass = "my_secret_password";
// $db = "app_db";
// try {
//     $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//     echo "Connected successfully";
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
