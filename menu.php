<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

$db = new Db();
$menu = $db->select("SELECT * FROM project.menu ORDER BY type ASC");

echo $twig->render('menu.html', ['menu' => $menu, 'title' => 'Menu', 'filename' => 'menu', 'logged_in' => $_SESSION['logged_in']]);