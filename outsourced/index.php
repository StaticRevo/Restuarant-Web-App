<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//Load from the DB
$db = new Db();


//$items = $db -> select("SELECT a.id, a.image, a.name as name, a.bio, t.name as type FROM items a inner join type t on a.type = t.id order by rescued_date desc");

echo $twig->render('index.html', ['items' => $items]);