<html>
<head>
  <meta charset="utf-8">
</head>
<body>

 <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
<?php

$tmpName = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$error = $_FILES['file']['error'];


$tabExtension = explode('.', $name);
$extension = strtolower(end($tabExtension));
//Tableau des extensions que l'on accepte
$extensions = ['pgn'];
if(in_array($extension, $extensions)){
    move_uploaded_file($tmpName, './upload/'.$name);
}
else{
    echo "Mauvaise extension";
}


?>
</body>
</html>