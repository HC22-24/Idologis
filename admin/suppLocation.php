<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ventes - IdoLogis</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <nav>
                <p><a href="page_admin.php" class="logo">IdoLogis</a></p>
                <ul>
                    <li><a class="navbtn" href="page_admin.php">Accueil</a></li>
                    <li><a class="navbtn" href="ventes_admin.php">Ventes</a></li>
                    <li><a class="navbtn" href="locationAdmin.php">Locations</a></li>
                    <li><a class="navbtn" href="contactAdmin.php">Contact</a></li>
                </ul>
                <ul>
                    <li><a href="/admin/page_admin.php" class="btncontact">Admin</a></li>
                </ul>
            </nav>
            <p class="menu_h">Menu </p>
        </header>

        <section class="section_principale">
            <form id="supp_ventes" action="" method="POST">
                <h1>Supprimer un bien</h1>
                <div class="inputs">
                    <input type="text" name="supp" placeholder="n° du bien à supprimer" value="<?php
                    if (isset($_POST['suppLocations'])) {
                        echo $_POST['suppLocations'];
                    }
                    ?>">
                    <div align="center">
                        <button type="submit">Supprimer</button>
                    </div>

                    <?php
                    include '../class.manipulecsv.php';
                    $objEleve = new ManipuleCsv("/var/www/html/csv/location.csv");

                    if (isset($_POST["supp"])) {
                        $suppr = $_POST["supp"];
                        $objEleve->suppLigne($suppr - 1);
                        $objEleve->setPointeur($suppr - 2);
                        for ($i = 0; $i < $assup; $i++) {
                            $tabLigne = $objEleve->getUneLigne();
                        }
                        $objEleve->enregistreCsv();
                    }
                    ?>

            </form>
        </section>
        <footer class="pied">
            <?php
            include '../class.manipulecsv.php';
            $objEleve = new ManipuleCsv("/var/www/html/csv/file.csv");
            $csv->setPointeur(0);
            $var = $csv->getUneLigne();
            echo $var[0];
            ?>
        </footer>
    </body>
</html>