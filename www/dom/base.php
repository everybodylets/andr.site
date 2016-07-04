<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$host="localhost";
$db = "finex";
$user = "root";
$pass = "";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
);
$pdo = new PDO($dsn, $user, $pass, $opt);
?>