<?php

require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

//Get db object
$db = new Db();   


// adds to the title tag
$title = "About";
    
// completes the CSS filename
$filename = "about";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename, 'logged_in' => $_SESSION['logged_in']]);
