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
        ];
        
        $title = "Menu";
    
        $filename = "menu";

        try {
            echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename]);
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
        
    }
 else 
     echo $twig->render('404.html');
}
else 
 echo $twig->render('404.html');
