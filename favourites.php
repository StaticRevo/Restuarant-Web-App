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
        // Check if the menu item already exists in favorites for the user
        $stmt = $db->prepare('SELECT * FROM favourites WHERE userID = ? AND menuitemID = ?');
        $stmt->bind_param('ii', $user_id, $menu_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // Menu item does not exist in favorites, so insert it
            if ($user_id !== null) {
                $stmt = $db->prepare('INSERT INTO favourites (userID, menuitemID) VALUES (?, ?)');
                $stmt->bind_param('ii', $user_id, $menu_id);
                $stmt->execute();

                // Set a flag to indicate successful addition to favorites
                $add_to_favourites_success = "true";
            }
        } else {
            // Menu item already exists in favorites
            $add_to_favourites_success = "false";
        }
    }
    // Redirect back to the menu details page
    header("Location: menudetails.php?id=$menu_id&add_to_favourites_success=$add_to_favourites_success");
    exit();
} else {
    // Invalid menu item ID
    echo 'Invalid menu item ID.';
}