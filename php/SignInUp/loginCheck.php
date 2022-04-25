<?php
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $psw = md5($password);  //Evito di salvare le password in chiaro nel database
?>