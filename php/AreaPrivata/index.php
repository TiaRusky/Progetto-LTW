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

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>

                <a class="logout-button" type="button" href="logout.php">
                    Logout
                </a>
            </div>
        </nav>

        <div class = "main">
            


            <!--Dove andranno le schede scaricate dal database-->
            <div class="card" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome della scheda</p>
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

            <div class="card" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome della scheda</p>
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

            <div class="card" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome della scheda</p>
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

            <div class="card" style="text-align:center">
                <div class="card-header">
                    <p class="card-title">Nome della scheda</p>
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