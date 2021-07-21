<?php

    session_start(); //vamos a trabajar con sesiones
    require_once("../librerias/funciones_gandhy.php");
    require_once '../config/conexion.php';

    $correo =$_POST['correo'];
    $password=$_POST['password']; //1234
    //$hash_password = hash('sha512',$password);

    //echo $hash_password;

//TRAEMOS EL CORREO Y PASSWORD DE LA BD, PARA COMPARAR CON LO QUE INSERTAN
    $result_consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo like '{$correo}'");

    if(mysqli_num_rows($result_consulta) > 0){ //si es mayo a 0 ya encontro una fila igual

        while($obj = $result_consulta->fetch_object()){
            //echo "{$obj->passwordd} <br>";
            //echo "{$obj->passwordd} <br>";

            if(password_verify("$password", trim($obj->passwordd))){
                
                // $result_consulta->close();
                // unset($obj);
                $_SESSION['usuario'] = $correo;  //para verificar que se inica session va acompañado de (line 3)
                $_SESSION["inicio"] = true;
                $_SESSION["data"] = $obj;
                header("location: ../principal/principal.php"); //le enviamos al PRINCIPAL
                exit;


            }else{
                echo mensaje_usuario("la contraseña no es valida!", "view/login.html");
            }
        }        
    }
    else {
        echo mensaje_usuario("el correo no existe, registrese", "view/login.html");
        exit;
    } 


?> 