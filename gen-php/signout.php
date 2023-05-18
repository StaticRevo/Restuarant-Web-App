<?php
    session_start();

    $_SESSION['logged_in'] = false;
    //unset($_SESSION);
    // session_destroy();
    header('Location: ../index.php');
    exit;



    //echo $twig->render('index.html', [
       // 'logged_in' => $_SESSION['logged_in']
   // ]);

