<?php
require_once('config.php');
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;
try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
$request = $pdo->prepare("select * from users");
$request->execute();

$users = $request->fetchAll(PDO::FETCH_OBJ);

$request->closeCursor();
$pdo = null;

echo '<table>';
echo '<tr><th>ID</th><th>Nom</th><th>Email</th></tr>';

usort($users, function ($a, $b) {
    return $a->id - $b->id;
});

foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . $user->id . '</td>';
    echo '<td>' . $user->name . '</td>';
    echo '<td>' . $user->email . '</td>';
    echo '<td><a href="modifier_utilisateur.php?id=' . $user->id . '">Modifier</a></td> ';
    echo '<td><a href="supprimer_utilisateur.php?id=' . $user->id . '">Supprimer</a></td>';
    echo '</tr>';
}

echo '</table>';

$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un nouvel utilisateur</h2>
    <form action="db_create.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="email">Adresse email :</label>
        <input type="email" name="email" id="email" required>
        <br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
