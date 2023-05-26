<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Get the menu item ID from the query parameter
$menu_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($menu_id !== false) {
    // Get db object
    $db = new Db();

    // Check if the menu item ID is not null
    if ($menu_id !== null) {
        // Prepare and execute the SQL statement to insert into the "favourites" table
        if ($user_id !== null) {
            $stmt = $db->prepare('INSERT INTO favourites (userID, menuitemID) VALUES (?, ?)');
            $stmt->bind_param('ii', $user_id, $menu_id);
            $stmt->execute();
        }
    }
    // Redirect back to the menu details page
    header("Location: menudetails.php?id=$menu_id");
    exit();
} else {
    // Invalid menu item ID
    echo 'Invalid menu item ID.';
}