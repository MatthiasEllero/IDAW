<?php
require_once('config.php');

$id = $_GET['id'];


    $connectionString = "mysql:host=" . _MYSQL_HOST;
    if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;

    try {
        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ="DELETE FROM users WHERE id = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header("Location: users.php");
        exit();
    } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
    }

?>