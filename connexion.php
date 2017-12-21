<?php
session_start();
echo "<h1>Je vais me coonnecter</h1>";

if(isset($_POST['ID']) && isset($_POST['pwd'])){
    $jsonAccount = file_get_contents("./account.json");
    $accountListe = json_decode($jsonAccount, TRUE);
    if(indentificationAdmin($_POST['ID'], $_POST['pwd'], $accountListe)){
        echo "<h1>WOILA</h1>";
        $_SESSION['connexion'] = "admin";

    }elseif(indentificationUser($_POST['ID'], $_POST['pwd'], $accountListe)){
        $_SESSION['connexion'] = "user";
    }
    else{
        $_SESSION['connexion'] = "nop";
    }

}

function indentificationAdmin($id, $pwd, $list ){
    foreach ($list["admin"] as $tuple => $value) {
        if($tuple == $id && $value == $pwd){
            return true;
        }
    }
    return false;
}

function indentificationUser($id, $pwd, $list ){
    foreach ($list["user"] as $tuple => $value) {
        if($tuple == $id && $value == $pwd){
            return true;
        }
    }
    return false;
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
    <input type="text" name="pwd" placeholder="pwd">
    <input type="submit">
</form>
</body>
</html>
