<?php
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
require_once 'gen-php/loginlogic.php';

if (isset($_POST['submit-favourites'])) {
    // PHPMailer code

    // Get the user's email address from the form
    $email = $_POST['email'];

    // Retrieve the favorite menu items from the database
    $db = new Db();
    $stmt = $db->prepare('SELECT * FROM menu WHERE id IN (SELECT menuitemID FROM favourites WHERE userID = ?)');
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $favourites = $result->fetch_all(MYSQLI_ASSOC);

    // Construct the email body with the list of favorites
    $body = '<h1>Favorite Menu Items</h1>';
    if (!empty($favourites)) {
        $body .= '<ul>';
        foreach ($favourites as $menu) {
            $body .= '<li>';
            $body .= '<h2>' . $menu['name'] . '</h2>';
            $body .= '<p>Type: ' . $menu['type'] . '</p>';
            $body .= '<p>Ingredients: ' . $menu['ingredients'] . '</p>';
            $body .= '<p>Price: ' . $menu['price'] . '</p>';
            $body .= '</li>';
        }
        $body .= '</ul>';
    } else {
        $body .= '<p>No favorite menu items found.</p>';
    }

    // Send the email
    try {
        $mail->addAddress($email);  // Add the recipient's email address
        $mail->Subject = 'Here are your favorite dishes from Seaside Grill!';
        $mail->Body = $body;
        $mail->AltBody = 'HTML is not supported.';

        $mail->send();
        echo 'Message has been sent';
        header('Location: displayfavs.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
