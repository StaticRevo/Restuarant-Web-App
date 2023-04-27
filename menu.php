<?php
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    $db = new Db();

   // $type = $db->select("SELECT id, name, type FROM type ORDER BY name");
    $menu = $db->select("SELECT * FROM menu ORDER BY type ASC");

    echo $twig->render('menu.html', ['menu' => $menu]);
