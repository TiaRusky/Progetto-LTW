<?php
//Blocca chiunque acceda a questo file tramite URL
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die(header( 'location: index.php' ));
    }

    session_start();
    $email = $_SESSION["email"];
    $nomeScheda = $_POST["nome"];

    $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
    $query = "delete from scheda where utente=$1 and nome=$2";
    $result = pg_query_params($dbconn,$query,array($email,$nomeScheda));
    if($result){
        pg_close($dbconn);
        echo "S";   //Success
    }
    else{
        pg_close($dbconn);
    }
    
?>    