<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

if ($user_id !== null) {
    // Get db object
    $db = new Db();

    // Prepare and execute the SQL statement to fetch the user's favorite menu items
    $stmt = $db->prepare('SELECT menu.* FROM favourites JOIN menu ON favourites.menuitemID = menu.id WHERE favourites.userID = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the favorite menu items into an array
    $favourites = [];
    while ($row = $result->fetch_assoc()) {
        $favourites[] = $row;
    }

    // Render the favourites page
    $title = "Favourites";
    $filename = "favourites";
    echo $twig->render($filename . '.html', ['title' => $title, 'filename' => $filename, 'logged_in' => $_SESSION['logged_in'], 'favourites' => $favourites]);
    exit();
} else {
    // User not logged in
    echo 'Please log in to view your favorite menu items.';
}