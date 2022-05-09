<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../pic/logo/10_crypto/small_logo.ico" type="image/icon type">
        <link href="../../css/nav-style.css" rel="stylesheet">
        <link href="../../css/login-style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/d8697e016e.js" crossorigin="anonymous"></script>
        <script src="../../js/login.js"></script>
        <script src="../../js/scroll.js"></script>
        <title>TechFit - Login</title>
    </head>
    <body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../html/index.html">
                    <img src="../../pic/logo/10_crypto/small_logo.png" class="home-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="../../html/index.html#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../html/index.html#team">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../html/index.html#gallery">Galleria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../html/index.html#products">Prodotti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../html/index.html#contacts">Contattaci</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <!--Form di login e signin-->
        <div class="container">
            <!--Login-->
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="form-container sign-up-container">
                
                <form action="loginCheck.php" method="POST">
                    <label class="form-label" for="chk" aria-hidden="true">Accedi</label>
                    <div class="flex-form">
                        <div class="form-item">
                            <input class="input-form" type="email" name="inputEmail" placeholder=" " required autocomplete="off">
                            <label>Email</label>
                        </div>
                        <div class="form-item">
                            <input class="input-form" type="password" name="inputPassword" placeholder=" " required>
                            <label>Password</label>
                        </div>
                        <input class="submit-form" type="submit" value="Sign in" name="inputSubmit">
                    </div>
                </form>
            </div>

            <!--Signup-->
            <div class="form-container sign-in-container">
                <form action="signInCheck.php" method="POST">
                    <div class="flex-form">
                        <label class="form-label" for="chk" aria-hidden="true">Registrati</label>
                        <div class="form-item">
                            <input class="input-form" type="email" name="inputEmail" placeholder=" " required autocomplete="off">
                            <label class="form-item-label">Email</label>
                        </div>
                      
                        <div class="form-item">
                            <input class="input-form" type="text" name="inputUsername" placeholder=" " required autocomplete="off">
                            <label class="form-item-label">Username</label>
                        </div>

                        <div class="form-item">
                            <input class="input-form" type="password" name="inputPassword" placeholder=" " required>
                            <label class="form-item-label">Password</label>
                        </div>

                        <input class="submit-form" type="submit" value="Sign up" name="inputSubmit">
                    </div>
                </form>
            </div>
        
        </div>
        <!--Alerts-->
        <?php
            $fullUrl = "http://".$_SERVER['HTTP_HOST']."".$_SERVER["REQUEST_URI"];

            //if(empty($_GET))exit();
            //strpos : Find the numeric position of the first occurrence of needle in the haystack string.

            //Gestione fallimenti registrazione
            if(strpos($fullUrl,"signup=ar") == true){   //Se l'url contiene ?signin=ar allora l'utente era già registrato
                echo "<div class='error'><span class='closebtn'>&times;</span><p  class='lng-err'><i class='fas fa-exclamation-triangle'></i> L'email inserita è già registrata! <i class='fas fa-exclamation-triangle'></i></p><p class='shrt-err'> L'email inserita è già registrata! </p></div>";
            }

            elseif(strpos($fullUrl,"signup=err")){
                echo "<div class='error'><span class='closebtn'>&times;</span><p></p></div>";echo "<div class='error'><span class='closebtn'>&times;</span><p  class='lng-err'><i class='fas fa-exclamation-triangle'></i> Errore registrazione utente! <i class='fas fa-exclamation-triangle'></i></p><p class='shrt-err'> Errore registrazione utente! </p></div>";
            }
            elseif(strpos($fullUrl,"signup=fc") || strpos($fullUrl,"login=fc")){
                echo "<div class='error'><span class='closebtn'>&times;</span><p  class='lng-err'><i class='fas fa-exclamation-triangle'></i> Errore connesione al db! <i class='fas fa-exclamation-triangle'></i></p><p class='shrt-err'> Errore connesione al db! </p></div>";
            }

            //Gestione fallimenti login
            elseif(strpos($fullUrl,"login=wd")){
                echo "<div class='error'><span class='closebtn'>&times;</span><p class='lng-err'><i class='fas fa-exclamation-triangle'></i> Credenziali errate! <i class='fas fa-exclamation-triangle'></i></p><p class='shrt-err'> Credenziali errate! </p></div>";
            }
        ?>
        
    </body>

</html>