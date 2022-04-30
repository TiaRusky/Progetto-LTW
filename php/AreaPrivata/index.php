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
        <title>TechFit - Home di <?php echo $_SESSION['username'];?></title>
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <div class= "header-content">

                        <!-- Barra di ricerca per le schede -->
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Cerca scheda" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Cerca</button>
                        </form>

                        <!-- Bottone di logout -->
                        <a class="logout-button" type="button" href="logout.php">
                            Logout
                        </a>
                    </div>

                </div>
            </div>
        </nav>

        <div class = "main">

            <!-- Bottone per aggiungere una nuova card-->
            <div class="card new-card">
                <a href="NewForm/new.php">
                    <button class="new-card-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="new-card-pic" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                </a>
            </div>

            <!--Dove andranno le schede scaricate dal database-->
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
                            <li><a class="dropdown-item" href="#">Visualizza</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Elimina</a></li>
                            <!--<li><a class="dropdown-item" href="#">Modifica Nome</a></li>  Da vedere se si riesce a fare-->
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Questa è una breve descrizione con caratteri</p>
                    <a href="#" class="btn btn-primary">train</a>
                </div>
            </div>

            <div class="card card-style" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome scheda</p>
                    <div class="dropdown">
                        <button class="tDots" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Visualizza</a></li>
                            <li><a class="dropdown-item" href="#">Elimina</a></li>
                            <li><a class="dropdown-item" href="#">Modifica Nome</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Questa è una breve descrizioneee</p>
                    <a href="#" class="btn btn-primary">ALLENATI</a>
                </div>
            </div>

            <div class="card card-style" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome scheda</p>
                    <div class="dropdown">
                        <button class="tDots" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Visualizza</a></li>
                            <li><a class="dropdown-item" href="#">Elimina</a></li>
                            <li><a class="dropdown-item" href="#">Modifica Nome</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Questa è una breve descrizione</p>
                    <a href="#" class="btn btn-primary">ALLENATI</a>
                </div>
            </div>

            <div class="card card-style" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome scheda</p>
                    <div class="dropdown">
                        <button class="tDots" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Visualizza</a></li>
                            <li><a class="dropdown-item" href="#">Elimina</a></li>
                            <li><a class="dropdown-item" href="#">Modifica Nome</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Questa è una breve descrizione</p>
                    <a href="#" class="btn btn-primary">ALLENATI</a>
                </div>
            </div>
        </div>
    </body>
</html>