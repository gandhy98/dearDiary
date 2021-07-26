<?php 
    require_once("../librerias/funciones_gandhy.php");
    require_once '../config/conexion.php';

//para verificar si podemos conectarnos o no a al base de datos
    /*if($conexion){ echo 'si esta conectado'; }
    else{ echo 'no esta conectado';}
    window.location = "view/signup.html";
    */

// VERIFICAR LA CONTRASEÑA!!!
function verificar_password($password,$confir_password){
    if(!empty($password) && !empty($confir_password)){
        if($password != $confir_password){
            return false;
        }else{
            return true;
        }   
    }
    else {
        return false;
    }  
}


//REGISTRAR LOS DATOS 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $confir_password=$_POST['confir_password']; 
/**** ENCRIPTAR EL PASSWORD */  

    // veriufica que el correo no exista en la base de datos 
    $verificar_correo=mysqli_query($conexion, "SELECT *FROM usuario WHERE correo='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo mensaje_usuario("esta cuenta ya existe", "view/signup.html");
        exit();

    }else {

        $password_final=verificar_password($password,$confir_password);
    
        if($password_final){
            
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
            $insertar = "INSERT INTO usuario(nombre,apellido,correo,passwordd) 
                            VALUES('$nombre','$apellido','$correo','$hash_password')";

            $ejecutar = mysqli_query($conexion, $insertar); // este va ejecutar
            if($ejecutar){
                echo mensaje_usuario("se registro corectamente, inicie sesion", "view/login.html");
                exit;
            }
            else{
                echo mensaje_usuario("intentelo nuevamente", "view/signup.html");
                exit;
            }
            mysql_close($conexion); //cerramos la conexion             

        }else {
            echo mensaje_usuario("la contraseña no coincide, vuelve a intentar", "view/signup.html");
        }


    }


?>