<?php


    
    define('DB_HOST', 'localhost:4306');
    define('DB_USER', 'root');
    define('DB_PASS', '');        
    define('DB_DATABASE', 'mydb');   

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if($connection->connect_error){
        echo $connection->connect_error;
    }

    
    