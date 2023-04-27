<?php

require_once __DIR__.'/bootstrap.php';   


// adds to the title tag
$title = "About";
    
// completes the CSS filename
$filename = "about";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename]);

?>
