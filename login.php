<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    $_SESSION['logged_in'] = false;
}

$error = null;
//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

// Load from the DB
$db = new Db();

// Check if the login form has been submitted
if (isset($_POST['email'], $_POST['password'], $_POST['login'])) {
    // Get the email and password from the form
    $email = clean_input( $_POST['email'] );
    $password = clean_input( $_POST['password'] );

    // Check if the email exists in the database
    $stmt = $db->prepare('SELECT * FROM Users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['Password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
            exit;
        } else {
            // Incorrect password
            $error = 'Incorrect password';
        }
    } else {
        // User not found
        $error = 'Email not found';
    }
}

// adds to the title tag
$title = "Login";

// completes the CSS filename
$filename = "login";

// Render view
echo $twig->render($filename . '.html', [
    'title' => $title,
    'filename' => $filename,
    'error' => $error ?? null,
    'logged_in' => $_SESSION['logged_in']
]);


