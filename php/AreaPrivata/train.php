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
        <script src="../../js/index.js"></script>
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

        <div class="container">  
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
                        <a class="train-btn" id="btn-recovery">Recupero</a>
                        <a href="./index.php" class="train-btn">Termina</a>
                    </div>
                </div>
                <div class="end-train">                
                    <div class="end-msg">Complimenti!<br> Hai terminato l'allenamento!</div>
                    <a href="./index.php" class="train-btn">Home</a>
                    <a class="train-btn" data-bs-toggle="modal" data-bs-target="#modalTrain">Continua allenamento</a>
                    <div class="firework"></div>
                    <div class="firework"></div>
                    <div class="firework"></div>
                </div>
            </div>
        </div> 
        <!-- Modal per scegliere il gruppo muscolare da allenare-->
        <div class="modal fade" id="modalTrain" tabindex="-1" aria-labelledby="modalTrainLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTrainLabel">Nome scheda</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Scegli quale gruppo allenare</h3>
                        <div class="grid-gruppi">
                            <button class="group-btn" id="btn-dorsali">
                                <img src="../../pic/new/icons8-bodybuilder-96-text.png" alt="logo-dorsali">
                            </button>

                            <button class="group-btn" id="btn-tricipiti">
                                <img src="../../pic/new/icons8-triceps-96-text.png" alt="logo-tricipiti">
                            </button>

                            <button class="group-btn" id="btn-petto">
                                <img src="../../pic/new/icons8-chest-96-text.png" alt="logo-petto">
                            </button> 

                            <button class="group-btn" id="btn-bicipiti">
                                <img src="../../pic/new/icons8-biceps-96-text.png" alt="logo-bicipiti">
                            </button>

                            <button class="group-btn" id="btn-gambe">
                                <img src="../../pic/new/icons8-quadriceps-96-text.png" alt="logo-gambe">
                            </button>

                            <button class="group-btn" id="btn-spalle">
                                <img src="../../pic/new/icons8-shoulders-96-text.png" alt="logo-spalle">
                            </button>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        <!--Alert-->
        <?php
            $fullUrl = "http://".$_SERVER['HTTP_HOST']."".$_SERVER["REQUEST_URI"];
            //Gestione fallimenti registrazione
            if(strpos($fullUrl,"err=noExc") == true){   //La scheda selezionata per l'allenamento,non ha esercizi per quel gruppo
                echo "<div class='error'>
                        <span class='closebtn'>&times;</span>
                        <span class='closebtn-fill'>&times;</span>
                        <p  class='err-msg'><i class='fas fa-exclamation-triangle'></i> Non ci sono esercizi per quel gruppo
                        </p></div>";
            }
        ?>


    </body>

    <svg xmlns="http://www.w3.org/2000/svg">
        <symbol id="checkmark-bold" viewBox="0 0 24 24">
            <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>
        </symbol>
    </svg>

</html>
