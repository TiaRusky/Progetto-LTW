<?php
    session_start(); //Ricavo la sessione (se presente)

    if(!isset($_SESSION['email'])){ //L'utente non ha effettuato il login
        header("Location: ../SignInUp/login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Area personale di <?php echo $_SESSION['username'];?></title>
    </head>
    <body>

    </body>
</html>