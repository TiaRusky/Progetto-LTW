<?php
    session_start(); //Ricavo la sessione (se presente)

    if(!isset($_SESSION['email'])){ //L'utente non ha effettuato il login
        header("Location: ../../SignInUp/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../../css/new-style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../../../js/new.js"></script>
        <title>TechFit - Nuova scheda di <?php echo $_SESSION['username'];?></title>
    </head>

    <body>

        <!-- Solito menù -->

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <div class= "header-content">

                        <!-- Barra di ricerca per i gruppi muscolari -->
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Cerca gruppo" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Cerca</button>
                        </form>

                        <!-- Bottone di logout -->
                        <a class="logout-button" type="button" href="../logout.php">
                            Logout
                        </a>
                    </div>

                </div>
            </div>
        </nav>

        <div class="main">
            <!-- Contiene i bottoni per la gestione della scheda che si sta creando-->
            <div class="top-main">
                <button class="top-main-button">
                    Salva
                </button>

                <button class="top-main-button">
                    Annulla
                </button>
            </div>

            <!-- Contiene gli esercizi, divisi per gruppi muscolari,
                     aggiunti finora-->
            <div class="body-main">

                <fieldset class="flex-dorsali flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        
                        <div class="legend-wrapper">
                            Dorsali
                            <!-- Bottone per aggiungere un nuovo esercizio relativo a questo gruppo-->
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#dorsali-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg> 
                            </button>
                        </div>  
                    </legend>
                </fieldset>

                <fieldset class="flex-tricipiti flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        <div class="legend-wrapper">
                            Tricipiti
                            <button class="new-card-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg> 
                            </button>
                        </div>
                    </legend>
                </fieldset>

                <fieldset class="flex-petto flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        
                        <div class="legend-wrapper">
                            Petto
                            <button class="new-card-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg> 
                            </button>
                        </div>
                    </legend>
                </fieldset>

                <fieldset class="flex-bicipiti flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        <div class="legend-wrapper">
                            Bicipiti
                            <button class="new-card-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg> 
                            </button>
                        </div>
                    </legend>
                </fieldset>

                <fieldset class="flex-gambe flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        <div class="legend-wrapper">
                            Gambe
                            <button class="new-card-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg> 
                            </button>
                        </div>
                    </legend>
                </fieldset>

                <fieldset class="flex-spalle flex-gruppo">
                    <legend class="float-none w-auto px-1">
                        <div class="legend-wrapper">
                            Spalle
                            <button class="new-card-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg> 
                            </button>
                        </div>
                    </legend>
                </fieldset>
            </div>

            <!-- Modal -->
            
            <!-- Modal dorsali -->
            <div class="modal fade" id="dorsali-modal" tabindex="-1" aria-labelledby="dorsali-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dorsali-modalLabel">Nuovo esercizio dorsali</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" required>
                                        <option value="deadlift">Deadlift</option>
                                        <option value="rematore_con_bilanciere">Rematore con bilanciere</option>
                                        <option value="lat_machine">Lat Machine</option>
                                        <option value="rematore_con_manubrio">Rematore con manubrio</option>
                                        <option value="pulley">Pulley</option>
                                        <option value="vertical_row">Vertical row</option>
                                        <option value="vertical_traction">Vertical traction</option>
                                        <option value="pull_ups">Pull ups</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>Modalità esecuzione</label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <!--
                                <div class="form-element">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn modal-btn">Aggiungi</button>
                                </div>
                                -->
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn modal-btn">Aggiungi</button>
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>
        
    </body>
</html>