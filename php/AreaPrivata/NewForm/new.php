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
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#tricipiti-modal"> 
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
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#petto-modal">
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
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#bicipiti-modal">
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
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#gambe-modal">
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
                            <button class="new-card-button" data-bs-toggle="modal" data-bs-target="#spalle-modal">
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
                            <form method="" action="" class="modal-form" id="form-dorsali">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="Deadlift">Deadlift</option>
                                        <option value="Rematore con bilanciere">Rematore con bilanciere</option>
                                        <option value="Lat Machine">Lat Machine</option>
                                        <option value="Rematore con manubrio">Rematore con manubrio</option>
                                        <option value="Pulley">Pulley</option>
                                        <option value="Vertical row">Vertical row</option>
                                        <option value="Vertical traction">Vertical traction</option>
                                        <option value="Pull ups">Pull ups</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-dorsali" data-dismiss="modal" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn" form="form-dorsali">Aggiungi</button>-->
                            
                            <label for="submit-form-dorsali" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Modal per i tricipiti -->
            <div class="modal fade" id="tricipiti-modal" tabindex="-1" aria-labelledby="tricipiti-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tricipiti-modalLabel">Nuovo esercizio tricipiti</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form" id="form-tricipiti">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="French Press">French Press</option>
                                        <option value="French Press con manubrio">French Press con manubrio</option>
                                        <option value="Push Down">Push Down</option>
                                        <option value="Spinte con cavo alto">Spinte con cavo alto</option>
                                        <option value="Push Up tra due panche">Push Up tra due panche</option>
                                        <option value="Dip presa stretta">Dip presa stretta</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-tricipiti" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn">Aggiungi</button>-->
                            <label for="submit-form-tricipiti" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Modal per il petto -->
            <div class="modal fade" id="petto-modal" tabindex="-1" aria-labelledby="petto-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="petto-modalLabel">Nuovo esercizio petto</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form" id="form-petto">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="Bench Press">Bench Press</option>
                                        <option value="Distensioni con manubri">Distensioni con manubri</option>
                                        <option value="Aperture con manubri">Aperture con manubri</option>
                                        <option value="Pullover">Pullover</option>
                                        <option value="Cavi">Cavi</option>
                                        <option value="Chest Press">Chest Press</option>
                                        <option value="Push Ups">Push Ups</option>
                                        <option value="Chest Press">Chest Press</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-petto" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn">Aggiungi</button>-->
                            <label for="submit-form-petto" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>

             <!-- Modal per i bicipiti -->
            <div class="modal fade" id="bicipiti-modal" tabindex="-1" aria-labelledby="bicipiti-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bicipiti-modalLabel">Nuovo esercizio bicipiti</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form" id="form-bicipiti">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="Curl con bilanciere">Curl con bilanciere</option>
                                        <option value="Curl con manubri">Curl con manubri</option>
                                        <option value="Curl presa a martello">Curl presa a martello</option>
                                        <option value="Curl con manubri su panca inclinata">Curl con manubri su panca inclinata</option>
                                        <option value="Curl alla panca Scott">Curl alla panca Scott</option>
                                        <option value="Curl al cavo basso">Curl al cavo basso</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-bicipiti" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn">Aggiungi</button>-->
                            <label for="submit-form-bicipiti" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Modal per le gambe -->
            <div class="modal fade" id="gambe-modal" tabindex="-1" aria-labelledby="gambe-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gambe-modalLabel">Nuovo esercizio gambe</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form" id="form-gambe">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="Squat">Squat</option>
                                        <option value="Affondi">Affondi</option>
                                        <option value="Leg Press">Leg Press</option>
                                        <option value="Leg Extension">Leg Extension</option>
                                        <option value="Leg Curl">Leg Curl</option>
                                        <option value="Adduttori">Adduttori</option>
                                        <option value="Abduttori">Abduttori</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-gambe" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn">Aggiungi</button>-->
                            <label for="submit-form-gambe" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>


            <!-- Modal per le spalle -->
            <div class="modal fade" id="spalle-modal" tabindex="-1" aria-labelledby="spalle-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="spalle-modalLabel">Nuovo esercizio spalle</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="" action="" class="modal-form" id="form-spalle">
                                <div class="form-element form-element-select">
                                    <label>Nome esercizio</label>
                                    <select name="nomeExc" class="form-select" required>
                                        <option value="Military Press">Military Press</option>
                                        <option value="Alzate laterali in piedi">Alzate laterali in piedi</option>
                                        <option value="Distensioni con manubri">Distensioni con manubri</option>
                                        <option value="Alzate frontali">Alzate frontali</option>
                                        <option value="Tirata al mento">Tirata al mento</option>
                                        <option value="Shoulders Press">Shoulders Press</option>
                                        <option value="Alzate con cavo basso">Alzate con cavo basso</option>
                                    </select>
                                </div>

                                <div class="form-element form-element-serie">
                                    <label>Num. serie</label>
                                    <input type="number" class="numSerie" name="numSerie" value="1" max="10" min="1" required>
                                </div>

                                <!-- Questa parte deve essere aggiunta con jquery: input number per ogni serie -->
                                
                                <div class="form-element numero-ripetizioni-element">
                                    <label>Num. ripetizioni serie 1</label>
                                    <input type="number" name="numRipetizioni" value="1" max="20" min="1" required>
                                </div>

                                <div class="form-element">
                                    <label>Recupero (secondi)</label>
                                    <input type="number" name="recupero" max="120" min ="20" class="recupero" required>
                                </div>
                                
                                <div class="form-element form-element-esecuzione">
                                    <label>Num. d'esecuzione</label>
                                    <input type="number" name="numOrdine" max="10" min="1" class="num-ordine" required>
                                </div>

                                <div class="form-element desc-element">
                                    <label>
                                        Modalità esecuzione
                                        <button type="button" class="info-button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Es: Superset; Stripping; Peak Contraction ..." data-bs-trigger="click">        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                            </svg>
                                        </button>
                                    </label>
                                    <input type="text" name="inputModEsec" maxlength="15">
                                </div>
                                <input type="submit" class="hidden" id="submit-form-spalle" hidden>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <!--<button type="button" class="btn modal-btn">Aggiungi</button>-->
                            <label for="submit-form-spalle" tabindex="0" class="modal-btn">Aggiungi</label>
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>
        
    </body>
</html>