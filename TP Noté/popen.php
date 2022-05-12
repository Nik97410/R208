<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <?php
        function conversion()  {
            $sortie = popen("/mnt/c/Users/frays/OneDrive/Bureau/perso/R208/Projet/build/ppgn_v2_0 -i /home/thomas/public_html/upload/in_3.pgn -o /home/thomas/public_html/upload/document.tex", "r");
            pclose($sortie);
        }

        echo conversion();
        if(file_exists("/home/thomas/public_html/upload/document.tex")){
            echo "Ficher .tex généré";
        } else {
            echo "Erreur";
        }
    ?>
    <form action="index.php">
        <input type="submit" value="Convertisseur">
    </form>
    <form action="pdf.php">
        <input type="submit" value="PDF">
    </form>

</body>
</html>