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
        <link rel="icon" href="../../pic/logo/10_crypto/small_logo.ico" type="image/icon type">
        <link href="../../css/private-style.css" rel="stylesheet">
        <!--<link href="../../css/nav-style.css" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../../js/index.js"></script>
        <title>TechFit - Home di <?php echo $_SESSION['username'];?></title>
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../html/index.html">
                    <img src="../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <div class= "header-content">

                        <!-- Barra di ricerca per le schede -->
                        <form class="d-flex"  name="search">
                            <input class="form-control me-2" type="search" placeholder="Cerca scheda" aria-label="Search" id="search-in" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit" id="search-btn">Cerca</button>                            
                        </form>

                        <!-- Bottone di logout -->
                        <a class="logout-button" type="button" href="logout.php">Logout</a>

                    </div>

                </div>
            </div>
        </nav>

        <div class = "main">

            <!-- Bottone per aggiungere una nuova card-->
            <div class="card new-card">
                <a href="NewForm/new.php">
                    <button class="new-card-button">  +  </button>
                </a>
            </div>

            <!--Dove andranno le schede scaricate dal database-->
            <?php 
                $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
                $query = "select * from scheda where utente = $1";
                $result = pg_query_params($dbconn,$query,array($_SESSION["email"]));

                if($tupla = pg_fetch_all($result,PGSQL_ASSOC)){
                    $n = count($tupla);
                    for($i = 0;$i<$n; $i++){    //Prelevo ogni scheda e la mostro
                        $descrizione = $tupla[$i]["descrizione"];
                        if($descrizione == "")$descrizione = "Nessuna descrizione";
                        echo '<div class="card card-style">
                                <div class="card-header">
                                    <p class="card-title" id="'.strtolower($tupla[$i]["nome"]).'">'.$tupla[$i]["nome"].'</p>
                                    <div class="dropdown">
                                        <button class="tDots" type="button" id="dropdownMenuButton'.$i.'" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        </svg>
                                        </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton'.$i.'">
                                        <li><a class="dropdown-item view-item" href="#" data-bs-toggle="modal" data-bs-target="#modalScheda">Visualizza</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item delete-item" href="#">Elimina</a></li>
                                    </ul>
                                </div>
                            </div>
                                <div class="card-body">
                                <p class="card-text">'.$descrizione.'</p>
                                <a class="btn btn-primary train-btn" data-bs-toggle="modal" data-bs-target="#modalTrain">train</a>
                            </div>
                        </div>';  
                    }
                }
                
                pg_close($dbconn);
            ?>
            <!--Placeholder di come devono essere composte le schede
            <div class="card card-style">
                <div class="card-header">
                    <p class="card-title">Nome scheda</p>
                    <div class="dropdown">
                        <button class="tDots" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalScheda">Visualizza</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Elimina</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Questa è una breve descrizione con caratteri</p>
                    <a href="#" class="btn btn-primary">train</a>
                </div>
            </div>
            -->

        </div>

        <!-- La modal che permette la visualizzazione delle schede -->
        <!-- Modal -->
        <div class="modal fade" id="modalScheda" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSchedaLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSchedaLabel"></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body corpo-modal">
                        <fieldset class="flex-dorsali flex-gruppo" id="dorsali">
                            <legend class="float-none w-auto px-1">
                                
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-bodybuilder-96-text.png" alt="logo-dorsali">
                                </div>
                            </legend>
                        
                        </fieldset>

                        <fieldset class="flex-tricipiti flex-gruppo" id="tricipiti">
                            <legend class="float-none w-auto px-1">
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-triceps-96-text.png" alt="logo-tricipiti">
                                </div>
                            </legend>
                        </fieldset>

                        <fieldset class="flex-petto flex-gruppo" id="petto">
                            <legend class="float-none w-auto px-1">
                                
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-chest-96-text.png" alt="logo-petto">
                                </div>
                            </legend>
                        </fieldset>

                        <fieldset class="flex-bicipiti flex-gruppo" id="bicipiti">
                            <legend class="float-none w-auto px-1">
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-biceps-96-text.png" alt="logo-bicipiti">
                                </div>
                            </legend>
                        </fieldset>

                        <fieldset class="flex-gambe flex-gruppo" id="gambe">
                            <legend class="float-none w-auto px-1">
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-quadriceps-96-text.png" alt="logo-gambe">
                                </div>
                            </legend>
                        </fieldset>

                        <fieldset class="flex-spalle flex-gruppo" id="spalle">
                            <legend class="float-none w-auto px-1">
                                <div class="legend-wrapper">
                                    <img src="../../pic/new/icons8-shoulders-96-text.png" alt="logo-spalle">
                                </div>
                            </legend>
                        </fieldset>

                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                     -->
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
        <i class="fas fa-exclamation-triangle"></i>
        <!--Alert-->
        <?php
            $fullUrl = "http://".$_SERVER['HTTP_HOST']."".$_SERVER["REQUEST_URI"];
            //Gestione fallimenti registrazione
            if(strpos($fullUrl,"err=noExc") == true){   //La scheda selezionata per l'allenamento,non ha esercizi per quel gruppo
                echo "<div class='error'>
                        <span class='closebtn'>&times;</span>
                        <span class='closebtn-fill'>&times;</span>
                        <p  class='err-msg'><i class='fas fa-exclamation-triangle'></i>Non ci sono esercizi per quel gruppo
                        </p></div>";
            }
        ?>
    </body>
</html>