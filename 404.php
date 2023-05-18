<?php
    # require_once
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/gen-php/clean_input.php';
    require_once 'gen-php/loginlogic.php';

    const title = "Page Not Found";
    const filename = "404";
    echo $twig->render(filename.".html", ['title' => title, 'filename' => filename, 'logged_in' => $_SESSION['logged_in']]);
?>
