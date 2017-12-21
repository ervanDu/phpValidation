<?php
session_start();
echo "<h1>Je vais me inscrire</h1>";

if(isset($_POST['ID']) && isset($_POST['pwd'])){
    $jsonAccount = file_get_contents("./account.json");
    $accountListe = json_decode($jsonAccount, TRUE);
    if(in_array($_POST['ID'], $accountListe["admin"]) && in_array($_POST['ID'], $accountListe["user"])){
        echo "bien vue l'artiste !";

    }else{
        $id = $_POST['ID'];
        $pwd = $_POST['pwd'];
        $accountListe["user"][$id] = $pwd;
        $accountListe = json_encode($accountListe);
        file_put_contents("./account.json", $accountListe);
    }

}else{

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>inscription</title>
</head>
<body>
<a href="./index.php">Retour</a>
<form method="POST">
    <input type="text" name="ID" placeholder="id">
    <input type="password" name="pwd" placeholder="pwd">
    <input type="submit">
</form>
</body>