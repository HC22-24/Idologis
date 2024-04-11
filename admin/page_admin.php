<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>IdoLogis</title>
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
        </header>
        <p class="menu_h">Menu </p>
    </div>

    <section class="section_principale">
        <div class="container_accueil">
            <ul>
                <li><a class="navbtn" href="ajouterVentes.php">Ajouter une vente</a></li>
                <li><a class="navbtn" href="suppVentes.php">Supprimer une vente</a></li>
                <li><a class="navbtn" href="ajouterLocation.php">Ajouter une location</a></li>
                <li><a class="navbtn" href="suppLocation.php">Supprimer une location</a></li>
                <li><a class="navbtn" href="apparence_admin.php">Apparence du site</a></li>
                <li><a class="navbtn" href="editAccueil.php">Modifications</a></li>
            </ul>
        </div>
    </section>

    <footer class="pied">
        <?php
        include '../class.manipulecsv.php';
        $csv = new ManipuleCsv("/var/www/html/csv/file.csv");
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