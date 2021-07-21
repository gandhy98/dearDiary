<?php

    // var_dump($_GET);

    require_once("../config/conexion.php");
    include_once("../modules/session_start.php");
    require_once("../librerias/funciones_gandhy.php");

    /**
     * DELETE nota
     * 
     */
    // obteniendo datos de llegada
    $idnotas_diario = $_GET["id"];

     // 1. consulta
    $query = "DELETE FROM notas_diario WHERE idnotas_diario = '$idnotas_diario'";

    // 2. ejecuitamos la consulta 
    $result_query = mysqli_query($conexion, $query);

    // evaluamos el resultado de la consulta
    if($result_query){
        echo mensaje_usuario("Se elimino!", "principal.php");
    }else{
        echo mensaje_usuario("No se elimino!", "principal.php");
    }