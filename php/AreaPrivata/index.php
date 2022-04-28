<?php
    session_start(); //Ricavo la sessione (se presente)

    if(!isset($_SESSION['email'])){ //L'utente non ha effettuato il login
        header("Location: ../SignInUp/login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/private-style.css" rel="stylesheet">
        <title>TechFit - Area personale di <?php echo $_SESSION['username'];?></title>
    </head>
    <body>
        <nav>
            <a class="logout-button" href = "logout.php">Logout</a>
        </nav>

        <div class="container">
            
            <div class="selection">
                <a href="#" class="selection-link">
                    <h3 class="selection-title">Inizia allenamento</h3>
                    <img src="../../pic/Privata/test.jpg" class="selection-pic">
                    <p>Inizia</p>
                </a>
            </div>

            <div class="selection">
                <a href="#" class="selection-link">
                    <h3 class="selection-title">Crea una nuova scheda</h3>
                    <img src="../../pic/Privata/test.jpg" class="selection-pic">
                    <p>Crea</p>
                </a>
            </div>

        </div>
    </body>
</html>