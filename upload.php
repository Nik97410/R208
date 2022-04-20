<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification de l'upload</title>
</head>
<body>

<?php
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
        $allowed = array("pgn" => "/pgn");
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filesize = $_FILES["file"]["size"];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier

        move_uploaded_file($_FILES["file"]["tmp_name"], "download/" . $_FILES["file"]["name"]);
        echo "Votre fichier a été téléchargé avec succès."; 
        }
    } else{
        echo "Error: " . $_FILES["file"]["error"];
    }

</body>
</html>