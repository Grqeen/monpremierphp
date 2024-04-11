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

function recupere_Cours(){
        $conn = connecte();
        echo "<br>";
        if ($conn !== null) {  // Vérifiez que la connexion est établie
            $sql = "SELECT * FROM cours";
            $stmt = $conn->query($sql);

            if ($stmt->rowCount() > 0) {
                // Affichage des en-têtes de colonnes
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "CodeCours: " . $row["CODECOURS"]. " - LibelleCours: " . $row["LIBELLECOURS"]. " - NbJours: " . $row["NBJOURS"]. "<br>";
                }
            } else {
                echo "0 results";
            }

            // Fermeture de la connexion
            $conn = null;
        } else {
            echo "Failed to connect to the database.";
        }
        }
