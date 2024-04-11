<?php
require("../params/parametreappli.php");
function connecte () {
 try {
        $conn = new PDO("mysql:host=" . servername . ";dbname=dbadonet", user, pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";  // C'est juste un message de confirmation, vous pouvez le retirer si vous le souhaitez
        return $conn;  // Retourne l'objet PDO de connexion
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

