<?php

$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../models/mainModel.php";
}else{
    require_once "./models/mainModel.php";
}

class adminModel extends mainModel
{
    protected function consultar_datoUsuario(){
        
    }

    protected function editarPerfil_Model(){
        $eval = false;
        $msj = "No se inserto";

        $verificar = $this->consultar_datoUsuario($data->idusuario);
        

            $query = "INSERT INTO 
                    nota
                    SET
                    titulo = '{$data->nombre }',
                    contenido = '{$data->apellido}',
                    fecha_publicacion = {$data->fecha_nacimiento},
                    url_foto = '{$data->url_foto}',
                ";
             
            $res = mainModel::ejecutar($query);

            if( $res->rowCount() > 0 ){
                $eval = false;
                $msj = "No se inserto la nota";
                $val = true;
                $msj = "Se inserto";
            }

        return ["eval"=>$eval, "msj"=>$msj];
  
    }
    /**
     * 
     */
    protected function obtenerNotasPublicas_Model(){
        $eval = false;
        $data_res = [];
        $msj_sys = "No se obtuvo las notas";
        
        $query = "SELECT nota.*, usuario.nombre, usuario.apellido, usuario.url_foto FROM nota inner join usuario on nota.usuario_idusuario = usuario.idusuario WHERE nota.estado = 2";

        $res_query = mainModel::ejecutar($query);
        if($res_query->rowCount() >= 1){
            while ($elem_doc = $res_query->fetch(PDO::FETCH_ASSOC)) {
                $data_res[] = $elem_doc;
            }
            $eval = true;
            $msj_sys = "Se obtenieron la notas";
        }
        return ['eval'=>$eval, 'data'=>$data_res, 'msj'=>$msj_sys ];

    }



    /**
     * 
     */
    protected function insertarNota_Model($data){
        $eval = false;
        $msj = "No se inserto la nota";

        $query = "INSERT INTO 
                    nota
                    SET
                    titulo = '{$data->titulo}',
                    contenido = '{$data->contenido}',
                    fecha_publicacion = {$data->fecha_publicacion},
                    url_foto = '{$data->url_foto}',
                    estado = '{$data->estado}',
                    usuario_idusuario = '{$data->usuario_idusuario}'
                ";
             
        $res = mainModel::ejecutar($query);

        if( $res->rowCount() > 0 ){
            $eval = true;
            $msj = "Se inserto la nota";
        }

        return ["eval"=>$eval, "msj"=>$msj];

    }



    private function consultar_registro($idusuario){
        $query = "SELECT * FROM retrive_password WHERE usuario_idusuario='$idusuario'";

        $res_query = mainModel::ejecutar($query);
        
        $res = false;

        if($res_query->rowCount() >= 1){
            $res = true;
        }

        return ["eval"=>$res];
    }

    public function insertPregunta_model($data){
        $val = false;
        $msj = "No se inserto";

        //si ya existe
        
        $verificar = $this->consultar_registro($data->idusuario);
        
        if($verificar["eval"] == true){
            
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
    private function verifyEmail_Model($data){
        $val= false;
        $msj = "no existe";
        $query = "SELECT * FROM usuario WHERE email='{$data->email}'";

        $verEmail = mainModel::ejecutar($query);

        if($verEmail-> rowCount() > 0){
            $val= true;
            $msj = "si existe";
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
                    // session_start();
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

