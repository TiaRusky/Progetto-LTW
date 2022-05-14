<?php
    session_start(); //Ricavo la sessione (se presente)

    if(!isset($_SESSION['email'])){ //L'utente non ha effettuato il login
        header("Location: ../SignInUp/login.php");
    }
?>
<!DOCTYPE html>
<html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../pic/logo/10_crypto/small_logo.ico" type="image/icon type">
        <link href="../../css/train-style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../../js/train.js"></script>
        <title>TechFit - Train di <?php echo $_SESSION['username'];?></title>
    </head>

    <body>
        <header class="sticky-top">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="logo-div">
                        <a class="navbar-brand" href="../../html/index.html">
                            <img src="../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                        </a>
                    </div>
                    <div class="logout-div">
                        <a class="logout-button" type="button" href="logout.php">Logout</a>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Sicuramente ogni pallina del progress delle serie dovrà essere gestita con un echo, le scrivo comunque statiche come modello -->

        <div class="container-fluid">
            <div class="player">
                <div class="info-exc">
                    <h1 id="exc-name">Nome esercizio</h1>
                    <h2 id="exc-desc">Modalità di esecuzione</h2>
                </div>
                
                <div class="timers">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <ul id="progress-bar" class="progressbar">
                                    <li class="active">Details</li>
                                    <li>Address</li>
                                    <li>add friends</li>
                                    <li>Confirm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="circle-wrap">
                        <div class="circle">
                            <div class="mask half">
                                <div class="fill"></div>
                            </div>
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
                            <div class="inside-circle"> 75% </div>
                        </div>
                    </div>   
                </div>
                <div class="buttons">
                    <a href="#" class="btn btn-primary btn-lg">Recupero</a>
                    <a href="./index.php" class="btn btn-primary btn-lg">Termina</a>
                </div>
            </div>
        </div>
    </body>

</html>