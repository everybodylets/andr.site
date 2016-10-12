<?php
$host="localhost";
$db = "finex";
$user = "root";
$pass = "";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $pass, $opt);
//$pds = new PDO($dsn, $user, $pass, $opt);
//$pde = new PDO($dsn, $user, $pass, $opt);
?>