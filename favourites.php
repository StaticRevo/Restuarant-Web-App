<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
//require_once __DIR__.'/menu.php';
require_once __DIR__.'/gen-php/loginlogic.php';
require_once 'gen-php/clean_input.php';
require_once 'gen-php/validate.php';


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

/*updated Luca Code*/
if(isset($_POST['submit-favourites'])){
    $formvalues['email'] = clean_input($_POST['email']);
    [$formvalues, $validations] = validateEmail($formvalues, $validations);
    
    if (count(validations) == 0){ // if email is valid
        // PHPMailer - used their github repository as guide
        try {

            $mail->addAddress($formvalues['email']);     //Add a recipient
            $mail->Subject = 'Here are your favourite dishes from Seaside Grill!';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b><span>Put favourites here</span>';
            $mail->AltBody = 'HTML is not supported.';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else { // if email is not valid
        echo "Message could not be sent. Error: {$validations['emailError']}";
    }
    unset($_POST);
}

const filename = 'favourites';

$page = $twig->render(filename.'.html', [ 'filename' => filename, 'title' => 'Favourites', 'logged_in' => $_SESSION['logged_in']]);
echo $page;
