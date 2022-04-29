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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>TechFit - Area personale di <?php echo $_SESSION['username'];?></title>
    </head>
    <body>
        <nav class="sticky-top navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>
                <a class="logout-button" type="button" href="logout.php">
                    Logout
                </a>
            </div>
        </nav>

        <div class="main">
            
            <div class="selection">
                <a href="#" class="selection-link">
                    <h3 class="selection-title">Workout</h3>
                    <img src="../../pic/Privata/test.jpg" class="selection-pic">
                    <p class="selection-desc">Inizia allenamento</p>
                </a>
            </div>

            <div class="selection">
                <a href="#" class="selection-link">
                    <h3 class="selection-title">Schede</h3>
                    <img src="../../pic/Privata/test.jpg" class="selection-pic">
                    <p class="selection-desc">Gestisci le tue schede di allenamento</p>
                </a>
            </div>

        </div>
    </body>
</html>