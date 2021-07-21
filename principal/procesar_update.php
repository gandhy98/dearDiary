<?php 
    // PRUEBA 
    //var_dump($_GET["idParaUpdate"]);
    // echo "<br>";
    // var_dump($_POST);

    include_once("../modules/session_start.php");
    require_once("../config/conexion.php");
    require_once("../librerias/funciones_gandhy.php");
    

    
    /**
     * UPDATE nota
     * 
     */
    // obteniedo datos del formulario de la página de actualizar
    $idnotas_diario = $_GET["idParaUpdate"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];

    // 1. consulta
    $query = "UPDATE notas_diario 
                SET titulo = '$titulo', descripcion = '$descripcion', fecha = '$fecha' 
                WHERE idnotas_diario = '$idnotas_diario' ";
    // 2. resultado de la consulta
    $result_query = mysqli_query($conexion, $query);

    // 3. evaluar si se ejecuto
    if($result_query){
        echo mensaje_usuario("Se actualizo!", "principal.php");
    } else {
        echo mensaje_usuario("No se actualizo!", "principal.php");
    }
