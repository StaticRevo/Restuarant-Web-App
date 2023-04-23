<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';

    
    // adds to the title tag
    $title = "Home";
    
    // completes the CSS filename
    $filename = "index";
    
    
    // Render view
    echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename]);
?>
