<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Ventes - IdoLogis</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            include 'class.manipulecsv.php';
            
            
            
            
            
                      
                    
                       try {
            $host = 'mysql:host=localhost;dbname=Idologis;charset=utf8';
            $login = 'eleve';
            $password = 'eleve';
            $pdo = new PDO($host, $login, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }


//$query = "select * from secteur";
    
    
//$var = $pdo->query($query)->fetch();   
//var_dump($var); 


                       try {
            $host = 'mysql:host=localhost;dbname=Idologis;charset=utf8';
            $login = 'eleve';
            $password = 'eleve';
            $pdo = new PDO($host, $login, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }


        

    $query = 'INSERT INTO `secteur` (`id`, `intitule`) VALUES (":", "testHC");';
    
    
//$var = $pdo->exec($query);   


        //$requete = 'INSERT INTO `secteur` (`id`, `intitule`) VALUES (":id", "Dunkerque");';

        
            
            
            
            
            $objEleve = new ManipuleCsv(__DIR__ . "/csv/vente.csv");

            $objEleve->setPointeur();


            while ($tabLigne = $objEleve->getUneLigne()) {

                echo "
                    
                        <div class='biens_vente'>
                        <div class='vente_img'>
                        <img src='img/" . $tabLigne[0] . "'/>
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
                        </ul>
                        </div>
                        </div>
                       ";
            }
            
            
            
            
            
            
            
            
            
             include 'class.manipulecsv.php';
            $objEleve = new ManipuleCsv(__DIR__ . "/csv/vente.csv");

            $objEleve->setPointeur();


            while ($tabLigne = $objEleve->getUneLigne()) {

                echo "
                    
                        <div class='biens_vente'>
                        <div class='vente_img'>
                        <img src='img/" . $tabLigne[0] . "'/>
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