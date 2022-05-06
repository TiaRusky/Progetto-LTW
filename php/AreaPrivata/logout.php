<?php
    session_start();

    if(isset($_SESSION['email'])){  //Cancello la sessione se presente
        $_SESSION=[];
        session_destroy();
    }

    header("Location: ../SignInUp/login.php"); //Rimando alla pagina di login
?>