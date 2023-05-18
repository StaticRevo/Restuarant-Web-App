<?php
//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once __DIR__.'/menu.php';

$is_id_set = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($is_id_set !== false)
{
    $db = new Db();
    $menuId = $db->quote($is_id_set);
    $result = $db->select("SELECT p.*, t.id as type_id FROM project.menu p 
                           INNER JOIN project.type t ON p.type = t.id 
                           WHERE p.id = $menuId");

    if (count($result) > 0){
        $menu = [
            'id'                => $result[0]['id'],
            'type'              => $result[0]['type'],
            'name'              => $result[0]['name'],
            'ingredients'       => $result[0]['ingredients'],
            'price'             => $result[0]['price'],
        ];

    echo $twig->render('menu.html', ['menu' => $menu, 'filename' => 'menu']);
        
    }
 else 
 echo $twig->render('404.html', ['title' => '404', 'filename' => '404', 'logged_in' => $_SESSION['logged_in']]);
}
else 
echo $twig->render('404.html', ['title' => '404', 'filename' => '404', 'logged_in' => $_SESSION['logged_in']]);