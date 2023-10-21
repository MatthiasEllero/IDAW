<?php

$id = $_GET['id'];

?>

<!DOCTYPE html>

<body>
    <h1>
        Confirmez vous la suppression de l'utilisateur ?
    </h1>
    <?php
    echo '<a href="db_delete.php'.'?id='.$id.'">Confirmer</a>'
    ?>
</body>