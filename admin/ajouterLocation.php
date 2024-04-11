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
            <form id="add_ventes" action="" method="GET" enctype="multipart/form-data">
                <h1>Ajouter une nouvelle location</h1>
                <div> 
                    vente ou Location : <select name="TYPE_BIEN" required="required">
                        <option value="">--Choisir une option--</option>
                        <option value="Vente">Vente</option>
                        <option value="Location">Location</option>
                    </select><br>
                    
                    Type : <select name="TYPE" placeholder="Type" required="required">
                        <option value="">--Choisir une option--</option>
                        <option value="Maison">Maison</option>
                        <option value="Appartement">Appartement</option>
                    </select><br>
                    Secteur : <input type="text" name="Secteur" required="required"><br>
                    Surface : <input type="number" name="Surface" required="required"><br>
                    
                    Prix : <input type="number" name="Prix"  required="required"><br>
                </div>    
                
                Mail : <input type="mail" name="Email" placeholder="Adresse Email"><br>
                
                <input type="file" name="Image" size=40>
                <div align="center">
                    <button type="submit">Ajouter</button>
                </div>

                <?php
                /*   include '../class.manipulecsv.php';
                  $csv = new ManipuleCsv("/var/www/html/csv/location.csv");

                  //cherche la 1er ligne vide (NULL)
                  $empty = false;
                  for ($vide = 0; $empty == false; $vide++) {
                  $csv->setPointeur($vide);
                  $tabLigne = $csv->getUneLigne();
                  if ($tabLigne == NULL) {
                  $empty = true;
                  }
                  }
                  $csv->setPointeur($vide); */

                try {
                    $host = 'mysql:host=localhost;dbname=Idologis;charset=utf8';
                    $login = 'eleve';
                    $password = 'eleve';
                    $pdo = new PDO($host, $login, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }

                if (isset($_GET['TYPE_BIEN']) && isset($_GET['TYPE']) && isset($_GET['Surface']) && isset($_GET['Secteur']) && isset($_GET['Prix'])) {
                    $id = $_GET['TYPE_BIEN'];
                    $type = $_GET['TYPE'];
                    $Surface = $_GET['Surface'];
                    $Secteur = $_GET["Secteur"];
                    $Prix = $_GET['Prix'];
                    ajouter($pdo, $id, $type, $Secteur, $Surface, $Prix);
                }

                function ajouter($pdo, $id, $type, $Secteur, $Surface, $Prix) {
                    $requete = 'INSERT INTO `BIEN` (`ID_TYPE_BIEN`, `ID_TYPE`, `ID_SECTEUR`, `SURFACE`, `PHOTO`, `PRIX`) VALUES (:id, :TYPE_BIEN, :TYPE, :Secteur, :Surface, "oih", :Prix);';
                    try {
                        $prep = $pdo->prepare($requete);
                        $prep->bindValue(':id', $id, PDO::PARAM_INT);
                        $prep->bindValue(':type', $type, PDO::PARAM_INT);
                        $prep->bindValue(':Secteur', $Secteur, PDO::PARAM_STR);
                        $prep->bindValue(':Surface', $Surface, PDO::PARAM_INT);
                        $prep->bindValue(':Prix', $Prix, PDO::PARAM_INT);
                        $prep->execute();
                    } catch (PDOException $e) {
                        die("erreur dans la requete " . $e->getMessage());
                    }
                }
/*
                $image_file = $_FILES["Image"];
                $image_type = exif_imagetype($image_file["tmp_name"]);



                if (!isset($image_file)) {
                    die('Aucun fichier sélectionné.');
                }


                if (!$image_type) {
                    die("Le fichier n'est pas une image.");
                }

                move_uploaded_file(
                        $image_file["tmp_name"],
                        "/var/www/html/img/" . $image_file["name"]
                );

                //force l'envois
                //https://pqina.nl/blog/image-upload-with-php/
                /* if (!isset($image_file)) {
                  die('Aucun fichier sélectionné.');
                  }
                 */


               /* if (!$image_type) {
                    die('Uploaded file is not an image.');
                }*/



                /* met tout dans $ligne et l'ajoute a la premiere ligne vide 
                  $ligne[0] = $_FILES["Image"]["name"];
                  $ligne[1] = $_POST['Type'];
                  $ligne[2] = $_POST['Secteur'];
                  $ligne[3] = $_POST['Surface'];
                  $ligne[4] = $_POST['Surface_Terrain'];
                  $ligne[5] = $_POST['Pièce'];
                  $ligne[6] = $_POST['Chambres'];
                  $ligne[7] = $_POST['Classe_énergétique'];
                  $ligne[8] = $_POST['Plus'];
                  $ligne[9] = $_POST['Email'];
                  $csv->addLigne($ligne);
                  $csv->enregistreCsv(); */
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