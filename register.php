<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//Load from the DB
$db = new Db();

//Check if we need to filter
if(isset($_GET['type'])) 
{
    $typeSelected = $db -> quote($_GET["type"]);
}
else
{
    $typeSelected = -1;
}

//Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Get the user's information from the form
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //Insert the user's information into the database
    $stmt = $db->prepare('INSERT INTO Users(name, surname, email, password) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $name, $surname, $email, $password);
    $stmt->execute();
}

// adds to the title tag
$title = "Register";
    
// completes the CSS filename
$filename = "register";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename]);
