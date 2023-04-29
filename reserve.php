<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/gen-php/clean_input.php';

    
    // adds to the title tag
    const title = "Reservations";

    // completes the CSS filename
    const filename = "reserve";
    
//    $db = new Db();
    
    $validations = array();
//    $formvalues = array();
    function validate($formvalues){
        // check name
        if (!empty($formvalues['name'])) {
            ;
        }
        else
        {
            $nameErr = "Name is required";
            $validations['nameError'] = $nameErr;
        }
        
        // check surname
        if (!empty($formvalues['surname'])) {
            ;
        }
        else
        {
            $surnameErr = "Surname is required";
            $validations['surnameError'] = $surnameErr;
        }
        
        // Check email field
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
        
        // check mobile
        if (!empty($formvalues['mobile'])) {
            if (!is_numeric($formvalues['mobile'])){
                $validations['mobileError'] = 'You did not enter a number.';
            } else
            if (($formvalues['mobile'] > 8)){
                $validations['mobileError'] = 'You did not enter a valid mobile number.';
            }
        }
        else
        {
            $validations['mobileError'] = "Mobile is required";
        }
        
        // check messageType - should not need checking since cannot be blank.
        if (!empty($formvalues['messageType'])) {
            ;
        }
        else
        {
            $validations['typeError'] = "Message type is required";
        }
        
        if (!empty($formvalues['messageType'])) { // need messageType to work with it
            if ($formvalues['messageType'] != 'Reservation'){
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
                if (!empty($_POST["datetime"])) {

                } else {
                    $validations['datetime'] = "Date and time are required";
                }
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
                   $formvalues['mobile']            ;
        
        $genTableFields = "name,surname,email,`mobile-num`";
        // if reservation
        if ($formvalues['messageType'] === 'reservation'){
            $db = new Db();
            $db -> query("INSERT INTO forms_reservation(reservation_date,{$genTableFields}) VALUES (" .
                               
                           $formvalues['datetime'] .",".
                         $genVar
                           .")");
        }
        // if message
        else{
            
            $db = new Db();
            $db -> query("INSERT INTO forms_contact(message_type,message,{$genTableFields}) VALUES (" .
                               $genVar .
                           $formvalues['messageType']    .",".
                           $formvalues['message']
                           .")");
        }
    }
    
    // $result = $db -> query("");




    if(isset($_POST['submit'])) 
    {
        
        /*$datetime = $_POST['datetime']; //We need to sanitize this first (more on this soon)
        $result = $db -> select("SELECT datetime FROM reservations WHERE datetime=".$datetime);
        
        if (count(result)>0){
            echo "This time is already booked."
        }*/
        
        
        
        $formvalues['name']           = clean_input( $_POST['name']       );
        $formvalues['surname']        = clean_input( $_POST['surname']    );
        $formvalues['email']          = clean_input( $_POST['email']      );
        $formvalues['mobile']         = clean_input( $_POST['mobile']     );
        $formvalues['datetime']       = clean_input( $_POST['datetime']   );
        $formvalues['messageType']    = clean_input( $_POST['type']);
        $formvalues['message']        = clean_input( $_POST['message']    );
        
        $formvalues = validate($formvalues);
        if (count($validations) === 0){
            execSQL($formvalues);
        } else {
            // Render view with error messages
            echo $twig->render(filename.".html", ['validations' => $validations, 'title' => title, 'filename' => filename]);
        }
    } else {
        // Render view
        echo $twig->render(filename.".html", ['title' => title, 'filename' => filename]);
    }
?>
