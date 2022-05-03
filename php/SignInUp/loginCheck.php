<?php
    if(!isset($_POST["inputSubmit"]))header("Location: login.php");

    else{
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $psw = md5($password);

        //Connessione al db
        try{
            $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
            $query = "select * from utente where email=$1";
            $result = pg_query_params($dbconn,$query,array($email));

            //Non esiste un utente registrato con tale email
            if(!$tupla = pg_fetch_array($result,NULL,PGSQL_ASSOC)){
                header("Location: login.php?login=wd");     //wd = wrong data
            }

            else{   //L'email inserita è registrata, devo verificare che la password corrisponda
                $dbPsw = $tupla["password"];
                echo $dbPsw!=$tupla["password"];
                
                $query = "select * from utente where email=$1 and password=$2";
                $result = pg_query_params($dbconn,$query,array($email,$psw));


                if($tupla = pg_fetch_array($result,NULL,PGSQL_ASSOC)){  //Autenticazione avvenuta con successo
                    //Creo la sessione e sposto l'utente verso la zona privata
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $tupla["username"];
                    pg_close($dbconn);
                    header("Location: ../AreaPrivata/index.php");
                }

                else{ 
                    pg_close($dbconn); 
                    header("Location: login.php?login=wd");     //wd = wrong data
                }
                
            }
        }
        
        //Prima verifico se c'è un utente regitrato con questa email
        catch(Exception $e){
            header("Location: login.php?login=fc"); //fd = failed connection
        }
    }
?>