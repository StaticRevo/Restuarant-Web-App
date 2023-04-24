<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//Check if we need to filter
if(isset($_GET['type'])) 
{
    $typeSelected = $db -> quote($_GET["type"]);
}
else
{
    $typeSelected = -1;
}
//Load from the DB
$db = new Db();

// adds to the title tag
$title = "Register";
    
// completes the CSS filename
$filename = "register";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename]);
