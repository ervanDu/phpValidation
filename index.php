<?php

$dir = opendir('.');
session_start();
$_SESSION["connexion"] = "nop";
$pages = [];

while (($file = readdir($dir)) !== false) {
    if (strpos($file, '.html')) {
        //array_push($pages, $file);
        array_push($pages, file_get_contents("./$file"));
    }
}
closedir($dir);

/*if(strlen(file_get_contents("./account.json") == 0)){
    $account = array();
    $account["user"]= array();
    $account["admin"]= array();
    file_put_contents("./account.json", json_encode($account));
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="main.css">
</head>
<body >
<nav>
    <h1>Coucou, je suis l'index</h1>
    <a href="connexion.php">Connexion</a>
    <a href="inscription.php">Inscription</a>
</nav>


<div>
    <ul class="luniqueUl">
        <?php

        foreach ($pages as $page) {
            echo "<li>";
            echo "<div>$page</div>";
            echo "</li>";
        }

        ?>
    </ul>
</div>
<main>

<!--    <img src="https://www.eastcottvets.co.uk/uploads/Animals/gingerkitten.jpg" alt="a kitten">-->
</main>

</body>
</html>