<?php

if (isset($_POST['page'])) {
    unlink("../" . $_POST['page']);
}

$dir = opendir('..');

$articles = [];

while (($file = readdir($dir)) !== false) {
    if (strpos($file, '.html')) {
        array_push($articles, $file);
    }
}

closedir($dir);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List pages</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>

<h1>Page list</h1>

<a href="/back/create.php">Create a page</a>


<?php

foreach ($articles as $article) {
    echo "<a style='display: inline' href='/$article'>$article</a>";
    ?>
    <form method="post" style="display: inline">
        <input type="hidden" name="page" value="<?= $article ?>">
        <input type="submit" value="X">
    </form>
    <?php
}
?>

</body>
</html>