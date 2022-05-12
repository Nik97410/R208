<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<?php
    function conversion()
    {

        //changer nom du fichier
        //exécuter une commande 

    exec("/usr/bin/pdflatex -output-directory /home/thomas/public_html/upload/ /home/thomas/public_html/upload/document.tex");
    }
    echo conversion();

        if(file_exists("/home/thomas/public_html/upload/document.pdf"))
        {
            echo "Ficher .pdf généré";
        } else {
            echo "Erreur";
        }
?>

<br>
<form action="dl.php">
        <input type="submit" value="Télécharger">
</form>

</body>
</html>