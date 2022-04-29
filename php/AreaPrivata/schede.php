<?php
    session_start(); //Ricavo la sessione (se presente)

    if(!isset($_SESSION['email'])){ //L'utente non ha effettuato il login
        header("Location: ../SignInUp/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        
    </body>
</html>