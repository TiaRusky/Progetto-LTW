<?php
    //Se raggiungo la pagina senza passare per la form
    if(!isset($_POST["inputSubmit"])){
        header("Location login.php");
    }

    //Prelevo i dati inseriti
    $email = $_POST["inputEmail"];
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];
    $pass = md5($password); //Evito di salvare in chiaro le password nel db
    
    //Connesione al db
    try{
        $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
        $query = "select * from utente where email = $1";
        $result = pg_query_params($dbconn,$query,array($email));
        if($tupla = pg_fetch_array($result,NULL,PGSQL_ASSOC)){  //Esiste già un utente con questa email
            pg_close($dbconn);
            header("Location: login.php?signup=ar");    //ar = already registered
        }

        //L'utente può registrarsi
        else{
            $query = "insert into utente values ($1,$2,$3)";
            $result = pg_query_params($dbconn,$query,array($email,$username,$pass));
            if($result){    //L'utente è stato creato con successo
                //Creo la sessione e mando l'utente sulla propria zona privata
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                pg_close($dbconn);
                header("Location: ../AreaPrivata/index.php");
            }

            else{       //Qualcosa è andato storto
                pg_close($dbconn);
                header("Location: login.php?signup=err");
            }
        }
    }
    catch(Exception $e){
        //echo $e->getMessage();
        header("Location: login.php?signup=fc"); //fd = failed connection
    }

?>