<?php

if (isset($_GET['style_form'])) {
    $style = $_GET['style_form'];
    setcookie('cv_style', $style, time() + 3600, '/');
    header('Location: index.php');
    exit();
}


require_once('template_header.php'); ?>


<form id="style_form" action="index.php" method="GET">
    <select name="style_form">
        <option value="style1">Style 1</option>
        <option value="style2">Style 2</option>
    </select>
    <input type="submit" value="Appliquer">
</form>

<header>
    Matthias ELLERO
</header>
<p class="bienvenu">
    Bienvenu sur ma page de présentation ! <br>
    Je suis Matthias ELLERO, élève à l'école IMT Nord Europe
</p>
<div class="container text-center">
    <img src="images/imt-nord-europe.png" class="logoIMT">
</div>

<div class="findepage fixed-bottom">
    <footer>
        <div class="container text-center menu fixed-bottom">
            <div class="row align-items-start">
                <div class="col">
                    <a href="cv.php"><button type="button" class="btn btn-primary btn-lg">CV</button></a>
                </div>
                <div class="col">
                    <a href="projets.php"><button type="button" class="btn btn-primary btn-lg">Projets</button></a>
                </div>
                <div class="col">
                    <a href="hobbies.php"><button type="button" class="btn btn-primary btn-lg">Hobbies</button></a>
                </div>
            </div>
        </div>
        <div class="container fixed-bottom boutonAccueil">
            <div><a href="index.php"><button type="button" class="btn btn-primary btn-lg">Revenir à
                        l'accueil</button></a></div>
        </div>
    </footer>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>