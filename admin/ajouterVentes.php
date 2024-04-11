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
            <form id="add_ventes" action="" method="POST" enctype="multipart/form-data">
                <h1>Ajouter une nouvelle vente</h1>
                <div> 
                    <input type="select" name="Type" placeholder="Type" required="required">
                    <input type="text" name="Secteur" placeholder="Secteur" required="required">
                    <input type="text" name="Surface" placeholder="Surface" required="required">
                    <input type="number" name="Surface_Terrain" placeholder="Surface Terrain" min="0" required="required">
                </div>
                <div>
                    <input type="number" name="Pièce" placeholder="Pièce" min="0" required="required">
                    <input type="number" name="Chambres" placeholder="Chambres" min="0 required="required""> 
                    <input type="select" name="Classe_énergétique" placeholder="Classe énergétique" required="required">
                    <input type="text" name="Plus" placeholder="Plus">
                </div>                        
                    <input type="mail" name="Email" placeholder="Adresse Email" required="required">
                    <input type="file" name="Image" size=40>
                    <div align="center">
                        <button type="submit">Ajouter</button>
                    </div>
                
                    <?php
include '../class.manipulecsv.php';
            $csv = new ManipuleCsv("/var/www/html/csv/vente.csv");

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
                    $ligne[9] = $_POST['Email'];
                    $csv->addLigne($ligne);
                    $csv->enregistreCsv();
                    ?>

            </form>
        </section>
        <footer class="pied">
            <?php include '../class.manipulecsv.php';
            $objEleve = new ManipuleCsv("/var/www/html/csv/file.csv");
                            $csv->setPointeur(0);
        $var = $csv->getUneLigne();
                    echo $var[0];
                    ?>
        </footer>
    </body>
</html>