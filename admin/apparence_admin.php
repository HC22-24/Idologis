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
        <form id="add_ventes" action="apparence_admin.php" method="POST">
            <h1>edit Accueil</h1>
            <div class="inputs">

                <input type="text" name="color" required="required" value="">
                <div align="center">
                    <button type="submit">Sauvegarder</button>
                </div>
        </form>
        <?php

if (isset($_POST[''])) {
    $color = $_POST['color'];
    echo "<style>  
        .section_principale{
        background-image:linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(img/background.jpg);
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        h1{
        color = <?php $color ?>;
        } </style>";
    }
            
        ?>
    </section>

    <footer class="pied">
<?php
include '../class.manipulecsv.php';
$csv = new ManipuleCsv("/var/www/html/csv/vente.csv");
$csv->setPointeur(0);
$var = $csv->getUneLigne();
echo $var[0];
?>
    </footer>
</body>
</html>