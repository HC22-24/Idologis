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
                    
                    Surface : <input type="number" name="Surface" required="required"><br>
                    
                    Prix : <input type="number" name="Prix" min="0" required="required"><br>
                </div>    
                
                Mail : <input type="mail" name="Email" placeholder="Adresse Email" required="required"><br>
                
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

                if (isset($_GET[]) && isset($_FILES["Image"])) {
                    $id = $_GET['TYPE_BIEN'];
                    $type = $_GET['TYPE'];
                    $Surface = $_GET['Surface'];
                    $Image = $_FILES["Image"];
                    $Prix = $_GET['Prix'];
                    ajouter($pdo, $id, $intitule);
                }

                function ajouter($pdo, $id, $type, $Surface, $Image, $Prix) {
                    $requete = 'INSERT INTO `secteur` (`id`, `intitule`) VALUES (:id, :intitule);';
                    try {
                        $prep = $pdo->prepare($requete);
                        $prep->bindValue(':id', $id, PDO::PARAM_INT);
                        $prep->bindValue(':type', $type, PDO::PARAM_INT);
                        $prep->bindValue(':Surface', $Surface, PDO::PARAM_INT);
                        $prep->bindValue(':Prix', $Prix, PDO::PARAM_STR);
                        $prep->bindValue(':Image', $Image, PDO::PARAM_STR);
                        $prep->execute();
                    } catch (PDOException $e) {
                        die("erreur dans la requete " . $e->getMessage());
                    }
                }

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


                if (!$image_type) {
                    die('Uploaded file is not an image.');
                }



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
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="ventes.php">Ventes</a></li>
                    <li><a href="locations.php">Locations</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <a href="/admin/page_admin.php" class="btncontact">Connexion</a>
            </nav>
            <p class="menu_h">Menu </p>
        </header>

        <section class="section_principale">
            <form id="add_ventes" action="" method="POST" enctype="multipart/form-data">
                <h1>Ajouter une nouvelle vente</h1>
                <div class="inputs">
                    <input type="select" name="Type" placeholder="Type" required="required">
                    <input type="text" name="Secteur" placeholder="Secteur" required="required">
                    <input type="text" name="Surface" placeholder="Surface" required="required">
                    <input type="number" name="Surface_Terrain" placeholder="Surface Terrain" min="0" required="required">
                    <input type="number" name="Pièce" placeholder="Pièce" min="0" required="required">
                    <input type="number" name="Chambres" placeholder="Chambres" min="0 required="required""> 
                    <input type="select" name="Classe_énergétique" placeholder="Classe énergétique" required="required">
                    <input type="text" name="Plus" placeholder="Plus">


                    <input type="file" name="Image" size=40>

                    <div align="center">
                        <button type="submit">Ajouter</button>
                    </div>

                    <?php
                    include 'class.manipulecsv.php';








                    //lecture fichier
                    $csv = new ManipuleCsv(__DIR__ . "/csv/vente.csv");

//cherche la 1er ligne vide (NULL)              
                    $empty = false;
                    for ($vide = 0; $empty == false; $vide++) {
                        $csv->setPointeur($vide);
                        $tabLigne = $csv->getUneLigne();
                        if ($tabLigne == NULL) {
                            $empty = true;
                        }
                    }
                    $csv->setPointeur($vide);


           
                    
                    

$image_file = $_FILES["Image"];
$image_type = exif_imagetype($image_file["tmp_name"]);



if (!isset($image_file)) {
    die('No file uploaded.');
}


if (!$image_type) {
    die('Uploaded file is not an image.');
}

move_uploaded_file(

    $image_file["tmp_name"],

    __DIR__ . "/img/" . $image_file["name"]
);

//force l'envois
//https://pqina.nl/blog/image-upload-with-php/
/*if (!isset($image_file)) {
    die('No file uploaded.');
}
*/


if (!$image_type) {
    die('Uploaded file is not an image.');
}
                    


//met tout dans $ligne et l'ajoute a la premiere ligne vide 
                    $ligne[0] = $_FILES["Image"]["name"];
                    $ligne[1] = $_POST['Type'];
                    $ligne[2] = $_POST['Secteur'];
                    $ligne[3] = $_POST['Surface'];
                    $ligne[4] = $_POST['Surface_Terrain'];
                    $ligne[5] = $_POST['Pièce'];
                    $ligne[6] = $_POST['Chambres'];
                    $ligne[7] = $_POST['Classe_énergétique'];
                    $ligne[8] = $_POST['Plus'];
                    $csv->addLigne($ligne);
                    $csv->enregistreCsv();
                    ?>

            </form>
        </section>
        <footer class="pied">
            <?php include 'class.manipulecsv.php';
                    $csv = new ManipuleCsv(__DIR__ . "/csv/file.csv");
                            $csv->setPointeur(0);
        $var = $csv->getUneLigne();
                    echo $var[0];
                    ?>
        </footer>
    </body>
</html>