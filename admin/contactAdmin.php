<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Contact - IdoLogis</title>
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
        <!-- Contenu de la page -->
        <section class="section_principale">
            <div class="accueil_contact">
                <h1>Pour nous contacter</h1>
                <ul>
                    <li><span>Adresse</span> : 1 place de la République 59300 Valenciennes Cedex</li>
                    <li><span>Email</span> : <a href="mail:contact@idologis.fr">contact@idologis.fr</a></li>
                    <li><span>Téléphone</span> : 03 27 00 00 00</li>
                    <li><span>Fax</span> : 03 27 00 00 01</li>
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
            menu.classList.toggle('menu-mobile')})
    </script>
</html>