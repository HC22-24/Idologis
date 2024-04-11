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

        <!-- Contenu de la page -->
        <section class="section_principale_vente">
            <div class="accueil_vente">
                <h1>Vente de bien immobilier</h1>
                <p>Achetez le bien qui vous correspond
                    parmi les annonces immobilières</p>
            </div>
        </section>
        <section class='sect_vente'>
            <?php
            include '../class.manipulecsv.php';
            $objEleve = new ManipuleCsv("/var/www/html/csv/vente.csv");
            $objEleve->setPointeur();

            $var = 0;

            while ($tabLigne = $objEleve->getUneLigne()) {

                $var = $var + 1;

                echo "
                    
                        <div class='biens_vente'>
                        <div class='vente_img'>
                        <img src='../img/" . $tabLigne[0] . "'/>
                        </div>
                        <div class='vente_txt'>
                        <h2>Caractéristiques:</h2>
                        <ul>
                        <li>Type : " . $tabLigne[1] . "</li>
                        <li>Secteur :" . $tabLigne[2] . "</li>
                        <li>Surface : " . $tabLigne[3] . "m²</li>
                        <li>Surface de terrain :" . $tabLigne[4] . " m²</li>
                        <li>" . $tabLigne[5] . " pièce(s)</li>
                        <li>" . $tabLigne[6] . " chambre(s)</li>
                        <li>Classe énergétique :" . $tabLigne[7] . "</li>
                        <li>Les plus : " . $tabLigne[8] . "</li>
                        <li>Contact : <a href='mailto:" . $tabLigne[9] . "'>" . $tabLigne[9] . "</a></li>
                         
                      
                        <form action=\"/admin/suppVentes.php\" method=\"post\">
                        <button type=\"submit\" name=\"suppVentes\" value=\"$var\">Supprimer</button>
                        </form>
                        </ul>
                        </div>
                        </div>
                       ";
            }
            ?>  
        </div>
    </section>
    <footer class="pied">
        <?php
        include '../class.manipulecsv.php';
        $csv = new ManipuleCsv("/var/www/html/csv/file.csv");
        $csv->setPointeur(0);
        $cop = $csv->getUneLigne();
        echo $cop[0];
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