<?php 
    $hn = 'localhost';
    $db = 'mydb';
    $un = 'root';
    $pw = '';
    $port = 3309;

    // require_once 'conexion.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
    
    if($conexion){ 
        // echo 'si esta conectado'; 
    }
    else{ 
        echo 'no esta conectado';
        die();
    }

?>
