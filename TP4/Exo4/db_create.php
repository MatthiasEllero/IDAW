<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $connectionString = "mysql:host=" . _MYSQL_HOST;
    if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;

    try {
        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $email]);

        header("Location: users.php");
        exit();
    } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
    }
}
?>