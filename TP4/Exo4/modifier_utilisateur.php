<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $connectionString = "mysql:host=" . _MYSQL_HOST;
    if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;

    try {
        $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sélectionnez l'utilisateur à partir de la base de données en fonction de son ID
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si l'utilisateur a été trouvé
        if ($utilisateur) {
            // Affichez un formulaire pré-rempli avec les informations actuelles de l'utilisateur
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Modifier l'utilisateur</title>
            </head>
            <body>
                <h2>Modifier l'utilisateur</h2>
                <form action="db_update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $utilisateur['name']; ?>" required>
                    <br>
                    <label for="email">Adresse email :</label>
                    <input type="email" name="email" id="email" value="<?php echo $utilisateur['email']; ?>" required>
                    <br>
                    <input type="submit" value="Enregistrer les modifications">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "Utilisateur non trouvé.";
        }
    } catch (PDOException $erreur) {
        echo 'Erreur : ' . $erreur->getMessage();
    }
} else {
    echo "ID d'utilisateur non spécifié.";
}
?>