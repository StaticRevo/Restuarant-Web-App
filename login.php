<?php
session_start();

$error = null;
//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';

// Load from the DB
$db = new Db();

// Check if the login form has been submitted
if (isset($_POST['email'], $_POST['password'], $_POST['login'])) {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $stmt = $db->prepare('SELECT * FROM Users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        var_dump($user); // Check the contents of the $user array
        if (password_verify($password, $user['Password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            header('Location: /Restaurant/index.php');
            exit;
        } else {
            // Incorrect password
            $error = 'Incorrect password';
            echo "Incorrect password for user with email: " . $email;
        }
    } else {
        // User not found
        $error = 'Email not found';
        echo "User not found with email: " . $email;
    }
}

// Set the header links based on whether the user is logged in or not
if (isset($_SESSION['user_id'])) {
    $headerLinks = [
        ['url' => 'index.php', 'label' => 'Home'],
        ['url' => 'menu.php', 'label' => 'Menu'],
        ['url' => 'about.php', 'label' => 'About'],
        ['url' => 'reserve.php', 'label' => 'Reservation'],
        ['url' => 'profile.php', 'label' => 'Profile'],
    ];
} else {
    $headerLinks = [
        ['url' => 'index.php', 'label' => 'Home'],
        ['url' => 'menu.php', 'label' => 'Menu'],
        ['url' => 'about.php', 'label' => 'About'],
        ['url' => 'reserve.php', 'label' => 'Reservation'],
        ['url' => 'login.php', 'label' => 'Sign in'],
        ['url' => 'register.php', 'label' => 'Register'],
    ];
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
    'headerLinks' => $headerLinks,
]);


