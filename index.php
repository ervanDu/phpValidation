<?php

$dir = opendir('.');
session_start();
$pages = [];

if (!isset($_SESSION['panier'])){
    $_SESSION['panier']= 0;
}

while (($file = readdir($dir)) !== false) {
    if (strpos($file, '.html')) {
        //array_push($pages, $file);
        array_push($pages, file_get_contents("./$file"));
    }
}
closedir($dir);

if (isset($_POST['deco'])){
    session_destroy();
}

if (isset($_POST['achat'])){

    $_SESSION['panier']++;
    var_dump($_SESSION['panier']);
}

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
    <?php
    if (isset($_SESSION['connexion'])){
        if ($_SESSION['connexion'] == "admin"){
            echo "<a href='/back/list.php'>Gestion Admin</a>";
        }
    ?>
        <form method="post" style="display: inline">
            <input type="hidden" name="deco" value="deco">
            <input type="submit" value="deconnexion">
        </form>
    <?php
        echo "j ai " . $_SESSION['panier'] . " super.s truc.s cool dans mon panier";
    }

    ?>
</nav>


<div>
    <ul class="luniqueUl">
        <?php

        foreach ($pages as $page) {
            echo "<li>";
            echo "<div>$page</div>";
         ?>
            <form method="post" style="display: inline">
                <input type="hidden" name="achat" value="$page">
                <input type="submit" value="acheter">
            </form>

        <?php
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