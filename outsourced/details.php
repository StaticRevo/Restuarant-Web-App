<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//1. Get the animal ID parameter from the request
if(isset($_GET['a'])) 
{

    $db = new Db();
    $animalId = $_GET['a']; //We need to sanitize this first (more on this soon)
    $result = $db -> select("SELECT a.*, t.name as type FROM animals a inner join type t on a.type = t.id WHERE a.id=". $animalId);

    if (count($result) > 0){
        // Animal loaded from store
        $animal = [
                'id'                => $result[0]['id'],
                'type'              => $result[0]['type'],
                'image'             => $result[0]['image'],
                'name'              => $result[0]['name'],
                'bio'               => $result[0]['bio'],
                'breed'             => $result[0]['breed'],
                'family'   	        => $result[0]['family'],
                'exercise'          => $result[0]['exercise'],
                'born'              => $result[0]['born'],
                'rescued_date'      => $result[0]['rescued_date']
        ];
        // Render view
        echo $twig->render('details.html', ['animal' => $animal] );
    }
    else
        echo $twig->render('404.html');
}
else
    echo $twig ->render('404.html');

