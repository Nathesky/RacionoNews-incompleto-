<?php

    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "raciono";
    
    $mysqli = new mysqli($host, $user, $pass, $base);
    if($mysqli -> error){
        die("falha ao conectar ao banco de dados: ".$mysqli->error);
    }
    
?>

