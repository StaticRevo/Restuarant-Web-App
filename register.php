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
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Get the user's information from the form
    $name       = clean_input( $_POST['name']       );
    $surname    = clean_input( $_POST['surname']    );
    $email      = clean_input( $_POST['email']      );
    $password   = clean_input( $_POST['password']   );
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Check if email already exists in database
    $stmt = $db->prepare(quote('SELECT COUNT(*) FROM users WHERE email = ?'));
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_NUM);
    $user_count = $row[0];
    if ($user_count > 0) {
        //Display error message
        $error_message = "User already registered";
    } else {
        //Insert the user's information into the database
        $stmt = $db->prepare(quote('INSERT INTO users(name, surname, email, password) VALUES (?, ?, ?, ?)'));
        $stmt->bind_param('ssss', $name, $surname, $email, $password);
        $stmt->execute();
        header('Location: login.php');
        
    }
}

// adds to the title tag
$title = "Register";
    
// completes the CSS filename
$filename = "register";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename, 'error_message' => $error_message]);

