<?php

//This brings in a twig instance for use by this script
require_once __DIR__.'/bootstrap.php';
require_once __DIR__.'/database.php';
//require_once __DIR__.'/menu.php';
require_once __DIR__.'/gen-php/loginlogic.php';




/*updated*/
if(isset($_POST['submit-favourites'])){
    // PHPMailer - used their github repository as guide
    
    try {
        $mail->addAddress($_POST['email']);     //Add a recipient
        $mail->Subject = 'Here are your favourite dishes from Seaside Grill!';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b><span>Put favourites here</span>';
        $mail->AltBody = 'HTML is not supported.';
        
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    unset($_POST);
}

const filename = 'favourites';

$page = $twig->render(filename.'.html', [ 'filename' => filename, 'title' => 'Favourites', 'logged_in' => $_SESSION['logged_in']]);
echo $page;