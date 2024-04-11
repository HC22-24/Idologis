<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>??? - IdoLogis</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css.css" rel="stylesheet" type="text/css" />
    </head>
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
            <form id="add_ventes" action="" method="POST" enctype="multipart/form-data">
                <h1>edit Accueil</h1>
                <div class="inputs">
                    <input type="select" name="Mention" required="required" value="<?php
include '../class.manipulecsv.php';
            $csv = new ManipuleCsv("/var/www/html/csv/file.csv");

                    $mention = $csv->getLigneNumero(0);
                    echo $mention[0];
                    ?>">



                    <input type="file" name="Image" size=40>

                    <div align="center">
                        <button type="submit">Ajouter</button>
                    </div>
            </form>
            <?php
            $Mention = $_POST['Mention'];

            if ($Mention) {
                for ($i = 0; $i < strlen($Mention); $i++) {
                    if ($Mention[$i] != ";") {
                        $var = $var.$Mention[$i];
                    } else {
                        $var = $var." ";
                    }
                }
            }
            $mention[0] = $var;
            $csv->setLigneNumero($mention, 0);
            $csv->enregistreCsv();
            ?>
        </section>

        <footer class="pied">
            <?php '../class.manipulecsv.php';
            $csv = new ManipuleCsv("/var/www/html/csv/vente.csv");
                            $csv->setPointeur(0);
        $var = $csv->getUneLigne();
                    echo $var[0];
                    ?>
        </footer>
    </body>
</html>