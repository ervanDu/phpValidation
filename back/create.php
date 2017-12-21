<?php

$msg = '';

if (isset($_POST['title'])) {
    include_once('../engine.php');
    $ficheArticles = array($_POST['title'], $_POST['content'], $_POST['photo'], $_POST['prix']);

    file_put_contents("../" . $_POST['title'] . ".html", $_POST['content']);

    file_put_contents("../" . $_POST['title'] . ".html", render_template("../" . $_POST['title'] . ".html", $ficheArticles));

    $msg .= "Page " . $_POST['title'] . ".html created";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pages</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>

<h1>Page creation</h1>

<a href="/back/list.php">List/delete pages</a>


<p><?= $msg ?></p>

<form action="" method="post">
    <input type="text" name="title" placeholder="title">
    <textarea name="content" id="content" placeholder="description" cols="50" rows="14"></textarea>
    <input type="text" name="photo" placeholder="Url de la photo">
    <input type="text" name="prix" placeholder="prix">
    <input type="submit">
</form>
</body>
</html>
