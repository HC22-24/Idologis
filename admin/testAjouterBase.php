<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>fgjhgf</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
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

            <form action="" method="GET" enctype="multipart/form-data">
                <input type="select" name="type" placeholder="type" required="required">
                <input type="text" name="secteur" placeholder="secteur" required="required">
                <button type="submit">Ajouter</button>
        </header>

        <section class="section_principale">
            <div class="container_accueil">
                <img src="img/logo_accueil.jpg" alt="Idologis" />  
                <p>Ventes et locations immobilières dans le Nord Pas-de-Calais</p> 

                <?php

                    try {
                        $host = 'mysql:host=localhost;dbname=Idologis;charset=utf8';
                        $login = 'eleve';
                        $password = 'eleve';
                        $pdo = new PDO($host, $login, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }

                    if (isset($_GET['type']) && isset($_GET['secteur'])){
                        $id = $_GET['type'];
                        $intitule = $_GET['secteur'];
                        ajouter($pdo, $id, $intitule);
                    }

                    
                    function ajouter($pdo, $id, $intitule) {
                        $requete = 'INSERT INTO `secteur` (`id`, `intitule`) VALUES (:id, :intitule);';
                        try {
                            $prep = $pdo->prepare($requete);
                            $prep->bindValue(':id', $id, PDO::PARAM_INT);
                            $prep->bindValue(':intitule', $intitule, PDO::PARAM_STR);
                            $prep->execute();
                        } catch (PDOException $e) {
                            die("erreur dans la requete " . $e->getMessage());
                        }
                    }
                ?>
            </div>
        </section>
        <footer>
            <?php
            include 'class.manipulecsv.php';
            $csv = new ManipuleCsv(__DIR__ . "/csv/file.csv");
            $csv->setPointeur(0);
            $var = $csv->getUneLigne();
            echo $var[0];
            ?>
        </footer>

    </body>
</html>