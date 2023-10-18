<?php
require_once('template_header.php');
?>
    <header>
        Mes Hobbies
    </header>
    <p class="bienvenu">
        Bienvenu sur ma page de Hobbies ! <br>
    </p>

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <p>Tennis</p>
                <img src="images/tennis.png" class="logoTennis">
            </div>
            <div class="col">
                <p>Gaming</p>
                <img src="images/casque.png" class="logoCasque">
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>