<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

$db = new Db();
$menuId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($menuId !== false) {
    $menu = $db->select("SELECT * FROM project.menu WHERE id = $menuId");

    if (count($menu) > 0) {
        $menu = $menu[0];
        echo $twig->render('menudetails.html', ['menu' => $menu, 'filename' => 'menudetails']);
    } else {
        echo $twig->render('404.html', ['title' => 'Page not Found', 'filename' => '404', 'logged_in' => $_SESSION['logged_in']]);

    }
} else {
    echo $twig->render('404.html', ['title' => 'Page not Found', 'filename' => '404', 'logged_in' => $_SESSION['logged_in']]);

}
