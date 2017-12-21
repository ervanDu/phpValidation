<?php

function render_template($fileName, $ficheArticles)
{
    $rendered = '';

    $template = fopen($fileName, 'r');

    while (!feof($template)) {
        $line = fgets($template);

        $rendered .= interpretor($line, $ficheArticles);
    }

    fclose($template);
    return $rendered;
}

function interpretor($line, $ficheArticles)
{
    $html = '';
    $html .="<div class='article' id=". $ficheArticles[0].">";
    $html .="<h1>".$ficheArticles[0]."</h1>";
    $html .="<div>descitption</div>";
    $html .="<p>".$ficheArticles[1]."</p>";
    $html .="<img src=". $ficheArticles[2].">";
    $html .="<p> Prix : ".$ficheArticles[3]." $</p>";
    $html .="</div>";

    return $html;
}