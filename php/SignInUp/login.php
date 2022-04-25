<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/login-style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../../js/login.js"></script>
        <title>TechFit - Login</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.html">
                        <img src="../pic/logo/10_crypto/logo.png" alt="" width="100" height="40">
                    </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                   <!--<span class="navbar-toggler-icon"></span>-->   
    
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">Gallery</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link">Contacts</a>
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
                    <label class="form-label" for="chk" aria-hidden="true">Login</label>
                    <div class="flex-form">
                        <div class="form-item">
                            <input class="input-form" type="email" name="inputEmail" placeholder=" " required>
                            <label>Email</label>
                        </div>
                            
                        <div class="form-item">
                            <input class="input-form" type="password" name="inputPassword" placeholder=" " required>
                            <label>Password</label>
                        </div>
                        <input class="submit-form" type="submit" value="Login" name="inputSubmit">
                    </div>
                </form>
            </div>

            <!--Signin-->
            <div class="form-container sign-in-container">
                <form action="signInCheck.php" method="POST">
                    <div class="flex-form">
                        <label class="form-label" for="chk" aria-hidden="true">Sign in</label>
                        <div class="form-item">
                            <input class="input-form" type="email" name="inputEmail" placeholder=" " required>
                            <label class="form-item-label">Email</label>
                        </div>
                      
                        <div class="form-item">
                            <input class="input-form" type="text" name="inputUsername" placeholder=" " required>
                            <label class="form-item-label">Username</label>
                        </div>

                        <div class="form-item">
                            <input class="input-form" type="password" name="inputPassword" placeholder=" " required>
                            <label class="form-item-label">Password</label>
                        </div>

                        <input class="submit-form" type="submit" value="Sign in" name="inputSubmit">
                    </div>
                </form>
            </div>
            
        </div>

    </body>

</html>