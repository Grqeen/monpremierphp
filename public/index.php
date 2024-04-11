<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require("../include/functionpdo.php");
        $conn = connecte();
        echo "<br><br>";
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
            ?>
    </body>
</html>
