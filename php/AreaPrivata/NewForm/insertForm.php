<?php
    //Blocca chiunque acceda a questo file tramite URL
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die(header( 'location: new.php' ));
    }

    session_start();
    
    $email = $_SESSION["email"];
    $input = $_POST["array"];   //Array di array associativi
    $nomeScheda = $_POST["nome"];   //Nome della scheda
    $descrizioneScheda = $_POST["descrizione"];  //Descrizione della scheda
    
    //Connessione al db

    $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
    $query = "select * from scheda where nome=$1 and utente=$2";
    $result = pg_query_params($dbconn,$query,array($nomeScheda,$email));

    if($tupla = pg_fetch_array($result,NULL,PGSQL_ASSOC)){  //Esiste già una scheda con quel nome associata a quell'utente
        pg_close($dbconn);
        echo "FAE"; //Form Already Exist
    }

    else{   //Posso creare la scheda
        $query = "insert into scheda values ($1,$2,$3)";
        $result = pg_query_params($dbconn,$query,array($nomeScheda,$email,$descrizioneScheda));

        //Scheda creata con successo
        if($result){
            //Ora bisogna creare i vari esercizi
            $length = count($input); //Lunghezza dell'array
            for($i = 0;$i<$length;$i++){
                $esercizio = $input[$i];
                $gruppoMuscolare = $esercizio["gruppoM"];
                $nomeEsercizio = $esercizio["nomeEser"];
                $numSerie = (int) $esercizio["numS"];
                $ripetizioni = $esercizio["rip"];
                $numEsecuzione = (int) $esercizio["numEse"];
                $recupero = (int) $esercizio["rec"];
                $descrizione = $esercizio["desc"];
                $query = "insert into esercizio values ($1,$2,$3,$4,$5,$6,$7)";
                $result = pg_query_params($dbconn,$query,array($nomeEsercizio,$email,$nomeScheda,$gruppoMuscolare,$numSerie,$numEsecuzione,$descrizione));

                if(!$result){
                    //Esercizio non inserito
                    pg_close($dbconn);
                    exit();
                }
            }

            //Tutti gli esercizi sono stati inseriti
            pg_close($dbconn);
            exit();
        }

        else{   //Inserimento non avvenuto
            pg_close($dbconn);
            echo "err";
        }
    }
?>