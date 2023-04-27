<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/database.php';
    
    $db = new Db();
    
    
    if(isset($_POST['submit'])) 
    {
        
        /*$datetime = $_POST['datetime']; //We need to sanitize this first (more on this soon)
        $result = $db -> select("SELECT datetime FROM reservations WHERE datetime=".$datetime);
        
        if (count(result)>0){
            echo "This time is already booked."
        }*/
        
        
        $db -> query("INSERT INTO forms(name,surname,email,mobile-num) VALUES (" .
                       $_POST('name')           .",".
                       $_POST('surname')        .",".
                       $_POST('email')          .",".
                       $_POST('mobile')         .")");
        
        if ($_POST['dropdown-form'] === 'reservation'){
            $result = $db -> query("INSERT INTO forms-reservation(gen-form-id,datetime) VALUES (" .
                               $_POST('datetime')
                               .")");
        }else{
            $result = $db -> query("INSERT INTO forms-contact(messageType,message) VALUES (" .
                               $_POST('messageType')    .",".
                               $_POST('message')
                               .")");
        }
        
    }


    /*if(isset($_POST['submit-contact']))
    {
        $result = $db -> query("INSERT INTO forms-contact(name,surname,type,message) VALUES (".
                               $_POST('name-c')           .",".
                               $_POST('surname-c')        .",".
                               $_POST('email-address-c')  .",".
                               $_POST('mobile-num-c')     .",".
                               $_POST('type')             .",".
                               $_POST('message')
                               .")");
    }*/
        
    
    // adds to the title tag
    $title = "Reservations";
    
    // completes the CSS filename
    $filename = "reserve";
    
    
    // Render view
    echo $twig->render("{$filename}.html", ['title' => $title, 'filename' => $filename]);
?>