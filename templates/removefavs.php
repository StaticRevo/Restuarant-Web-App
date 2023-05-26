<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

if ($user_id !== null) {
    // Check if the menu item ID is provided in the query string
    if (isset($_GET['id'])) {
        $menu_id = $_GET['id'];

        // Get db object
        $db = new Db();

        // Prepare and execute the SQL statement to remove the menu item from favorites
        $stmt = $db->prepare('DELETE FROM favourites WHERE userID = ? AND menuitemID = ?');
        $stmt->bind_param('ii', $user_id, $menu_id);
        $stmt->execute();

        // Redirect back to the favorites page
        header('Location: displayfavs.php');
        exit();
    }
} else {
    // User not logged in
    echo 'Please log in to remove menu items from favorites.';
}