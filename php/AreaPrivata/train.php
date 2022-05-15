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
        <script src="../../js/jquery.countdown360.js"></script>
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

        <div class="main">
            <div class="player">
                <div class="info-exc">
                    <h1 id="exc-name"></h1>
                    <h2 id="exc-desc"></h2>
                </div>
                
                <div class="progress-wrapper">
                    <ol class="progressBar">

                    </ol>
                </div>
                
                <div id="countdown"></div>

                <div class="buttons">
                    <a class="btn btn-primary btn-lg" id="btn-recovery">Recupero</a>
                    <a href="./index.php" class="btn btn-primary btn-lg">Termina</a>
                </div>
            </div>
        </div>



    </body>

    <svg xmlns="http://www.w3.org/2000/svg">
        <symbol id="checkmark-bold" viewBox="0 0 24 24">
            <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>
        </symbol>
    </svg>

</html>
