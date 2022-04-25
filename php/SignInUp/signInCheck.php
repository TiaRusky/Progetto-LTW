<?php
    //Prelevo i dati inseriti
    $email = $_POST["inputEmail"];
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];
    $pass = md5($password); //Evito di salvare in chiaro le password nel db
    
    //Connesione al db
    
?>