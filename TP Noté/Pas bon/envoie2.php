<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','SAE23');

// get the post records
$nom_Client = $_POST['nom_Client'];
$prenom_Client = $_POST['prenom_Client'];
$adresse_Client = $_POST['adresse_Client'];
$code_postal_Client = $_POST['code_postal_Client'];
$ville_Client = $_POST['ville_Client'];

// database insert SQL code
$sql = "INSERT INTO `tbl_contact` (`Id`, `Client`, `Commande`, `Produit`) VALUES ('0', '$nom_Client', '$prenom_Client', '$adresse_Client', '$ville_Client')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "Valeurs insérer";
}

?>