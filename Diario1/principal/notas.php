<?php 
    require_once("../librerias/funciones_gandhy.php");
    include_once("../modules/session_start.php");
    require_once '../config/conexion.php';

    
    //if(isset($_POST['GUARDAR'])){
        $id_usuario = $_SESSION["data"]->idusuario;       
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['descripcion'];
        $fecha = new DateTime($_POST['fecha']);
        // echo $fecha->format('d-m-Y');
        $fecha_db = $fecha->format('Y-m-d');

        // $query = "INSERT INTO notas_diario (idnotas_diario, titulo, descripcion, fecha, usuario_idusuario) VALUES (NULL, 'sasda', 'sasa', '2021-07-02', '40');"
        $insertar = "INSERT INTO notas_diario(titulo,descripcion,fecha,usuario_idusuario)
            VALUES('$titulo','$descripcion','$fecha_db','$id_usuario')";
            
        $ejecutar = mysqli_query($conexion, $insertar); // este va ejecutar
        if($ejecutar){
            
            echo mensaje_usuario(" tu nota se guardo correctamente" , "principal.php");
            
            exit;
        }
        
        else{
            echo mensaje_usuario("intentelo nuevamente", "view/notas.html");
            exit;
        }
        
        mysql_close($conexion); //cerramos la conexion 

        
    //}
    
?>
