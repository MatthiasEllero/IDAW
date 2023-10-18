<?php
    session_start();
?>

<!doctype html>
<html>

<head>
    <title>
        CV Matthias ELLERO
    </title>
    <meta charset="utf-8">
    <?php
    $style = isset($_COOKIE['cv_style']) ? $_COOKIE['cv_style'] : 'style1';
    if ($style == 'style1') {
        echo '<link rel="stylesheet" href="sitepro1.css">';
    } elseif ($style == 'style2') {
        echo '<link rel="stylesheet" href="sitepro2.css">';
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>


<body>
<?php

if (isset($_POST['logout'])) {
        
    session_destroy();
    header('Location: index.php');
}

if(!isset($_SESSION['login'])){

    echo'
<form id="login_form" action="connexion.php" method="GET">
    <table>
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Mot de passe :</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>';}

else{
    echo '<p> Bienvenu '.$_SESSION['login'].'</p>';
}

?>