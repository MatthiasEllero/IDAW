<?php
require_once("config.php"); 

$db_host = _MYSQL_HOST;
$db_port = _MYSQL_PORT;
$db_name = _MYSQL_DBNAME;
$db_user = _MYSQL_USER;
$db_password = _MYSQL_PASSWORD;

try {
    $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}