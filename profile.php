<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

//Load from the DB
$db = new Db();

//Check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

//Get the user ID from the session
$user_id = $_SESSION['user_id'];

//Fetch user data from the DB
$stmt = $db->prepare('SELECT * FROM Users WHERE id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    //User not found
    header('Location: /login.php');
    exit;
}

// adds to the title tag
$title = "Profile";

// completes the CSS filename
$filename = "profile";

// Render view
echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename, 'user' => $user]);
