<?php

    $hostname = "localhost";
    $databasename = "id12738869_base";
    $username = "id12738869_master";
    $password = "C]1+iP]mTCx/3[^l";
    
    
    $conexao = new PDO("mysql:host=$hostname;dbname=$databasename",
                       $username, $password);
    
    print_r($conexao);
    

?>