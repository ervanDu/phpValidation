<?php
session_start();
echo "<h1>Je vais me coonnecter</h1>";

if(isset($_POST['ID'])){
    $jsonAccount = file_get_contents("./account.json");
    $accountListe = json_decode($jsonAccount, TRUE);
    var_dump($accountListe["user"]);
    if(in_array($_POST['ID'], $accountListe["user"])){
        echo "<h1>WOILA</h1>";
        $_SESSION['connexion'] = "user";

    }elseif(in_array($_POST['ID'], $accountListe["admin"])){
        $_SESSION['connexion'] = "admin";
    }
    else{
        $_SESSION['connexion'] = "nop";
    }
    var_dump($_SESSION['connexion']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>connexion</title>
</head>
<body>
<a href="./index.php">Retour</a>
<form method="POST">
    <input type="text" name="ID" placeholder="id">
    <input type="text" name="Pwd" placeholder="pwd">
    <input type="submit">
</form>
</body>
</html>
