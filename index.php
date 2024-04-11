<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>IdoLogis</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <link href="css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <nav>
                <p><a href="index.php" class="logo">IdoLogis</a></p> 
                <ul>
                    <li><a class="navbtn" href="index.php">Accueil</a></li>
                    <li><a class="navbtn" href="ventes.php">Ventes</a></li>
                    <li><a class="navbtn" href="locations.php">Locations</a></li>
                    <li><a class="navbtn" href="contact.php">Contact</a></li>
                </ul>
                <ul>
                    <li><a href="/admin/page_admin.php" class="btncontact">Connexion</a></li>
                </ul>
            </nav>
            <p class="menu_h">Menu </p>
        </header>

        <section class="section_principale">
            <div class="container_accueil">
                <img src="img/logo_accueil.jpg" alt="Idologis" />  
                <p>Ventes et locations immobilières dans le Nord Pas-de-Calais</p> 
            </div>
        </section>
        <footer>
            <?php
            include 'class.manipulecsv.php';
            $csv = new ManipuleCsv(__DIR__ . "/csv/file.csv");
            $csv->setPointeur(0);
            $var = $csv->getUneLigne();
            echo $var[0];
            ?>
        </footer>

    </body>
    <script>
        const menuH = document.querySelector(".menu_h")
        const menu = document.querySelector(".menu")
        menuH.addEventListener('click', () => {
            menu.classList.toggle('menu-mobile')
        })
    </script>
</html>