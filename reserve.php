<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/gen-php/clean_input.php';
    
    $db = new Db();
    

    function validate($formvalues){
        if (!empty($formvalues['name']){
            ;
        }
        else
        {
            $nameErr = "Name is required";
            $validations['nameError'] = $nameErr;
        }
            
        if (!empty($formvalues['surname']){
            ;
        }
        else
        {
            $surnameErr = "Surname is required";
            $validations['surnameError'] = $surnameErr;
        }
         
        //Check email field
        if (!empty($_POST["email"])) {
            $email = clean_input($_POST["email"]);
            //FILTER_VALIDATE_EMAIL is one of many validation filters: https://www.php.net/manual/en/filter.filters.validate.php
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr= 'You did not enter a valid email.';
                $validations['emailError'] = $emailErr;
            }
        }
        else
        {
            $emailErr = "Email is required";
            $validations['emailError'] = $emailErr;
        }

        
        if ($_POST[]){
            //Check message field   
            if (!empty($_POST["message"])) {
                $message = clean_input($_POST["message"]);
                if(strlen($message)>150){
                    $messageErr=  "Messages cannot be longer than 150 characters.";
                    $validations['messageError'] = $messageErr;
                }
            }
            else {
                $messageErr = "Message is required";
                $validations['messageError'] = $messageErr;
            }
        }

        return $formvalues;
    }
    
    function execSQL($formvalues){
        // database has 2 tables: `forms-reservation` and `forms-contact`
        
        // common values
        $genVar = $formvalues['name']           .",".
                   $formvalues['surname']     .",".
                   $formvalues['email']       .",".
                   $formvalues['mobile']      .","      ;

        // if reservation
        if ($_POST['dropdown-form'] === 'reservation'){
            $result = $db -> query("INSERT INTO forms-reservation(gen-form-id,datetime) VALUES (" .
                                   $genVar .
                               $formvalues['datetime']
                               .")");
        }
        // if message
        else{
            $result = $db -> query("INSERT INTO forms-contact(messageType,message) VALUES (" .
                                   $genVar .
                               $formvalues['messageType']    .",".
                               $formvalues['message']
                               .")");
        }
    }
    




    if(isset($_POST['submit'])) 
    {
        
        /*$datetime = $_POST['datetime']; //We need to sanitize this first (more on this soon)
        $result = $db -> select("SELECT datetime FROM reservations WHERE datetime=".$datetime);
        
        if (count(result)>0){
            echo "This time is already booked."
        }*/
        
        $formvalues['name']           = clean_input( $_POST('name')       );
        $formvalues['surname']        = clean_input( $_POST('surname')    );
        $formvalues['email']          = clean_input( $_POST('email')      );
        $formvalues['mobile']         = clean_input( $_POST('mobile')     );
        $formvalues['datetime']       = clean_input( $_POST('datetime')   );
        $formvalues['messageType']    = clean_input( $_POST('messageType'));
        $formvalues['message']        = clean_input( $_POST('message')    );
        
        $formvalues = validate($formvalues);
        execSQL($formvalues);
    }
        
    
    // adds to the title tag
    $title = "Reservations";
    
    // completes the CSS filename
    $filename = "reserve";
    
    
    // Render view
    echo $twig->render("{$filename}.html", ['title' => $title, 'filename' => $filename]);
?>
