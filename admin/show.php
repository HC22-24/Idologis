<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = $_GET["id"];



        try {
            $host = 'mysql:host=localhost;dbname=Idologis;charset=utf8';
            $login = 'eleve';
            $password = "eleve";
            $pdo = new PDO($host, $login, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }


        ?>
    </body>
</html>
