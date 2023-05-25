<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/gen-php/clean_input.php';
    require_once 'gen-php/loginlogic.php';
    require_once 'gen-php/validate.php';

    
    // adds to the title tag
    const title = "Reservations";

    // completes the CSS filename
    const filename = "reserve";
    
//    $db = new Db();
    
//    $validations = array();
//    $formvalues = array();
    function validate($formvalues){ // Citation: validations got from lecture resources (Shelter example)
        $validations = []; // to make sure it is defined
        
        [$formvalues, $validations] = validateName($formvalues, $validations);
        [$formvalues, $validations] = validateSurname($formvalues, $validations);
        [$formvalues, $validations] = validateEmail($formvalues, $validations);
        [$formvalues, $validations] = validateMobile($formvalues, $validations);
        
        
        
        // check messageType - should not need checking since cannot be blank.
        if (!empty($formvalues['messageType'])) {
            ;
        }
        else
        {
            $validations['typeError'] = "Message type is required";
        }
        
        // check message. Message is different accoring to `messageType`
        if (!empty($formvalues['messageType'])) { // need messageType to work with it
            if ($formvalues['messageType'] != 'reservation'){
                //Check message field   
                if (!empty($formvalues['message'])) {
                    // $message = clean_input($_POST["message"]); // already called function
                    if(strlen($formvalues['message']) > 150){
                        $messageErr=  "Messages cannot be longer than 150 characters.";
                        $validations['messageError'] = $messageErr;
                    }
                }
                else {
                    $messageErr = "Message is required";
                    $validations['messageError'] = $messageErr;
                }
            } else {
                // check datetime
                if (!empty($formvalues["datetime"])) {

                } else {
                    $validations['datetimeError'] = "Date and time are required";
                }
            }
        }

        return [$formvalues,$validations];
    }
    
    
    function execSQL($formvalues){
        // database has 2 tables: `forms_reservation` and `forms_contact`
        
        // common values
        $genVar = "'".$formvalues['name']."'"           .",".
                   "'".$formvalues['surname']."'"     .",".
                   "'{$formvalues['email']}'"       .",".
                   $formvalues['mobile']            ;
        
        $genTableFields = "name,surname,email,mobile_num";
        // if reservation
//        echo $formvalues['messageType']; // debug
        if ($formvalues['messageType'] === 'reservation'){
            $db = new Db();
            $db -> query("INSERT INTO forms_reservation(reservation_date,{$genTableFields}) VALUES (" .
                               
                      "STR_TO_DATE('{$formvalues["datetime"]}', '%Y-%m-%dT%H:%i')" .",".

                         $genVar
                           .")");
        }
        // if message
        else{
            
            $db = new Db();
            $db -> query("INSERT INTO forms_contact(message_type,message,{$genTableFields}) VALUES (" .
                               
                           "'".$formvalues['messageType']."'"    .",".
                           "'".$formvalues['message']."'"              .",".
                          $genVar
                           .")");
        }
    }
    
    // $result = $db -> query("");


    function setMessageTypeSelected($messageType){ // to render the webpage with the option the user previously selected.
        
//        $messageTypeSelected = ['','','']; // length 3, one for each form type.
        $messageTypeSelected[$messageType] = 'selected="selected"';
        return $messageTypeSelected;
    }

    

    if(isset($_POST['submit'])) 
    {
        // unset() - https://stackoverflow.com/questions/8440030/php-remove-key-on-post  
//        unset($_POST['submit']); // debug
        
        /*$datetime = $_POST['datetime']; //We need to sanitize this first (more on this soon)
        $result = $db -> select("SELECT datetime FROM reservations WHERE datetime=".$datetime);
        
        if (count(result)>0){
            echo "This time is already booked."
        }*/
        
        $db = new Db();
        $formvalues['name']           = $db -> quote( clean_input( $_POST['name']       ) );
        $formvalues['surname']        = $db -> quote( clean_input( $_POST['surname']    ) );
        $formvalues['email']          = $db -> quote( clean_input( $_POST['email']      ) );
        $formvalues['mobile']         = $db -> quote( clean_input( $_POST['mobile']     ) );
        $formvalues['datetime']       = $db -> quote( clean_input( $_POST['datetime']   ) );
        $formvalues['messageType']    = $db -> quote( clean_input( $_POST['type']       ) );
        $formvalues['message']        = $db -> quote( clean_input( $_POST['message']    ) );
        
        [$formvalues,$validations] = validate($formvalues);
        
//        echo count($validations); // debug
//        unset($_POST);
        if (count($validations) == 0){
            execSQL($formvalues);
            
            // mail
            try {
                // email to notify customer care
                $mail->addAddress('customercare@seasidegrill.mt');     //Add a recipient
                //$mail->addAddress($formvalues['email']); // send email to submitter with form copy
                $mail->Subject = "{$formvalues['messageType'] } Form Submission";
                $emailMsg =
                    "Name:\t"           .$formvalues['name']         .
                    "\nSurname:\t"        .$formvalues['surname']      .
                    "\nEmail:\t"          .$formvalues['email']        .
                    "\nMobile:\t"         .$formvalues['mobile']       .
                    "\nMessage Type:\t"   .$formvalues['messageType']  
                ;
                if (($formvalues['messageType'] == 'question') or ($formvalues['messageType'] == 'complaint')){
                    $emailMsg .= "\nMessage:\n".$formvalues['message'];
                }elseif ($formvalues['messageType'] == 'reservation'){
                    $emailMsg .= "\nDate and Time:\t"  .$formvalues['datetime'];
                }
                $mail->isHTML(false);
                $mail->Body    = $emailMsg;
                //$mail->AltBody = $emailMsg; // if HTML does not work. In this case, no HTML is needed.

                $mail->send();
                //echo "<script>alert('Automated email has been sent');</script>";
            } catch (Exception $e) {
                echo "<script>alert('Automated email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
            
            echo $twig->render(filename.".html", [
                'form_status' => "Form has been submitted successfully.",
                'title' => title, 'filename' => filename]);
//            echo "Submitted successfully."; // to substitute with render webpage that successful submission.
        } else {
            // Render view with error messages
            echo $twig->render(filename.".html", [
                'form_status' => "Form submission is unsuccessful.",
                'validations' => $validations,
                'formvalues' => $formvalues,
                'typeSelected' => setMessageTypeSelected($formvalues['messageType']),
                
                'title' => title, 'filename' => filename]);
            
//            echo "unsuccessful.";
//            $validations=[]; // reset variable
        }
    } else {
        // Render view for first time
        echo $twig->render(filename.".html", ['title' => title, 'filename' => filename, 'logged_in' => $_SESSION['logged_in']]);
    }
?>
