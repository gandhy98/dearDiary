<?php

$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../models/mainModel.php";
}else{
    require_once "./models/mainModel.php";
}

class adminModel extends mainModel
{

    private function consultar_registro($idusuario){
        $query = "SELECT * FROM retrive_password WHERE usuari_idusuario='$idusuario'";

        $res = mainModel::ejecutar($query);
        
        return $res;
    }

    public function insertPregunta_model($data){
        $val = false;
        $msj = "No se inserto";

        //si ya existe
        
        $verificar = $this->consultar_registro($data->idusuario);
        if($verificar==true ){

            $val = false;
            $msj = "ya existe";

           $query = "UPDATE retrive_password 
                        SET respuesta = '{$data -> respuesta1}' 
                        WHERE pregunta='cual es tu color favorito' AND usuario_idusuario = '{$data->idusuario}' 
                ";

            $res = mainModel::ejecutar($query);

            $query1 = "UPDATE retrive_password 
                        SET respuesta = '{$data -> respuesta2}' 
                        WHERE pregunta='cual es el nombre de tu mascota' AND usuario_idusuario = '{$data->idusuario}'                
                ";
                 
            $res1 = mainModel::ejecutar($query1);

            if( $res->rowCount() > 0 || $res1->rowCount() > 0 ){
                $val = true;
                $msj = "Se actualizo";
            }
            
        }  
        else{
            $query = "INSERT INTO 
                    retrive_password (pregunta,respuesta,estado,usuario_idusuario)
                    VALUES
                    ('cual es tu color favorito','{$data->respuesta1}','{$data->estado}',{$data->idusuario}),
                    ('cual es el nombre de tu mascota','{$data->respuesta2}','{$data->estado}',{$data->idusuario})
                ";
             
            $res = mainModel::ejecutar($query);

            if( $res->rowCount() > 0 ){
                $val = true;
                $msj = "Se inserto";
            }
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

        $query = "SELECT * FROM usuario WHERE email='{$data->email}'";
        $verEmail = mainModel::ejecutar($query);

        if($verEmail->rowCount() > 0){
            $val = false;
            $msj = "el correo ya existe,intente con otro";
        }
        else{
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
        }
        return ["val" => $val, "msj" => $msj];
    }
    
}

