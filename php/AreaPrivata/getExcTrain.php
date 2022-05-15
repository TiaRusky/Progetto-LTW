<?php
    //Blocca chiunque acceda a questo file tramite URL
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ){
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die(header( 'location: index.php' ));
    }

    session_start();
    $email = $_SESSION["email"];
    $nomeScheda = $_POST["nome"];
    $gruppoM = $_POST["gruppoM"];
    
    $dbconn = pg_connect("host=localhost user=postgres password=passwordLTW dbname=ProgettoLTW port=5432");
    $query = "select * from esercizio where utenteScheda=$1 and nomeScheda=$2 and gruppoM=$3 order by numOrdine";
    $result = pg_query_params($dbconn,$query,array($email,$nomeScheda,$gruppoM));

    if($tupla = pg_fetch_all($result,PGSQL_ASSOC)){
        echo json_encode($tupla);
    }
    else{
        echo "err";
    }
    pg_close($dbconn);
?>