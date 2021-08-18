<?php

$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../models/mainModel.php";
}else{
    require_once "./models/mainModel.php";
}

class adminModel extends mainModel
{

    public function insertPregunta_model($data){
        $val = false;
        $msj = "No se inserto";

        $query = "INSERT INTO usuarioretrive_password (pregunta,respuesta,estado,usuario_idusuario)
            VALUES('cual es tu color favorito','{$data->respuesta1}','{$data->estado}',15),
            ('cual es el nombre de tu mascota','{$data->respuesta2}','{$data->estado}',15)
            ";
            
        
        $res = mainModel::ejecutar($query);

        if( $res->rowCount() > 0 ){
            $val = true;
            $msj = "Se inserto";
        }

        return ["val" => $val, "msj" => $msj];

    }
    /**
     * 
     */
    public function login_Model($data){

        $query = "SELECT * FROM usuario WHERE email='{$data->email}'";

        $res = mainModel::ejecutar($query);
        
        $session = false;

        if($res->rowCount() > 0){
            while ($usuario = $res->fetch(PDO::FETCH_ASSOC)) {
                # code...
                if(mainModel::verificar_password($data->password, $usuario["password"])){
                    session_start();
                    $_SESSION["app"] = true;
                    $_SESSION["data"] = $usuario;
                    $session = true;
                }
                else{
                    alert("revise el correo o password");    
                }
                
            }
        }


        return $session;

    }


    /**
     * 
     */
    public function registrar_Model($data){

        $val = false;
        $msj = "No se inserto";

        // encriptando the password
        $pass_encriptado = mainModel::encriptar($data->password);

        $query = "INSERT INTO usuario SET email = '{$data->email}',
                                            password = '{$pass_encriptado}', 
                                            nombre = '{$data->nombre}',
                                            apellido = '{$data->apellido}',
                                            estado = '{$data->estado}'
        ";

        $res = mainModel::ejecutar($query);

        if( $res->rowCount() > 0 ){
            $val = true;
            $msj = "Se inserto";
        }

        return ["val" => $val, "msj" => $msj];
    }
    
}

