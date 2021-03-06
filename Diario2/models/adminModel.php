<?php

$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../models/mainModel.php";
}else{
    require_once "./models/mainModel.php";
}

class adminModel extends mainModel
{

    /**
     * seguirPerfil_Model
     */
    protected function seguirPerfil_Model($data){
        $data_res = [];
        $eval = [];
        $msj_sys = [];

        $eval["v1"] = true;

        $msj_sys["m1"] = "no se inserto registro (select)";
        $msj_sys["m3"] = "no se elimino registro (delet)";

        // verifica si ya se esta siguiendo el perfil
        $res_siguiendo = $this->siguiendoPerfil_Model($data);
        $msj_sys["m2"] = $res_siguiendo["msj"];

        if($res_siguiendo["eval"] === false){
            
            $query = "INSERT INTO 
                        seguiendo 
                        SET  
                        usuario_idusuario = '$data->usuario_idusuario',
                        usuario_idusuario1 = '$data->usuario_idusuario1'
                    ";
    
            $res_query = mainModel::ejecutar($query);
    
            if($res_query->rowCount() >= 1){
                $eval["v1"] = true;
                $msj_sys["m1"] = "se inserto registro (select)";
            }

        }else{

            $query = "DELETE FROM
                        seguiendo 
                        WHERE
                        usuario_idusuario = '$data->usuario_idusuario'
                        AND
                        usuario_idusuario1 = '$data->usuario_idusuario1'
                    ";
    
            $res_query = mainModel::ejecutar($query);
    
            if($res_query->rowCount() >= 1){
                $eval["v1"] = true;
                $msj_sys["m3"] = "se elimino registro (delet)";
            }

        }


        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];
    }

    protected function siguiendoPerfil_Model($data){
        $data_res = [];
        $eval = false;
        $msj_sys = [];

        $msj_sys["m1"] = "No sigue el perfil";

        $query = "SELECT * 
                    FROM seguiendo 
                    WHERE usuario_idusuario = '$data->usuario_idusuario' 
                    AND usuario_idusuario1 = '$data->usuario_idusuario1'
                    LIMIT 1
                ";

        $res_query = mainModel::ejecutar($query);

        if($res_query->rowCount() >= 1){
            $eval = true;
            $msj_sys["m1"] = "siguiendo perfil";
        }

        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];
    }


    /**
     * MOD. GET LIKES
     */
    protected function getLikesNote_Model($data){
        $data_res = [];
        $eval = false;
        $msj_sys = [];

        $msj_sys["m1"] = "No se obtuvo like";

        $query = "SELECT * FROM calificacion 
                    WHERE nota_idnota = '$data->nota_idnota'
                ";

        $res_query = mainModel::ejecutar($query);
        $data_res["cant"] = 0;
        if($res_query->rowCount() >= 1){
            $data_res["cant"] = $res_query->rowCount();
            $eval = true;
            $msj_sys["m1"] = "Se obtuvo like";
        }

        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];
    }

    /**
     * MOD. ADD LIKE
     */
    public function addlikeNote_Model($data){
        $data_res = [];
        $eval = false;
        $msj_sys = [];

        $msj_sys["m1"] = "No se inserto like";

        $query = "INSERT calificacion SET 
                    usuario_idusuario = '$data->usuario_idusuario',
                    nota_idnota = '$data->nota_idnota'
                ";

        $res_query = mainModel::ejecutar($query);

        if($res_query->rowCount() >= 1){
            $eval = true;
            $msj_sys["m1"] = "Se inserto like";
        }

        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];
    }


    /**
     * MODIULO COMENTARIOS
     */

    protected function insertarComentario_Model($data){
        $data_res = [];
        $eval = false;
        $msj_sys = [];

        $msj_sys["m1"] = "No se inserto comentario";

        $query = "INSERT comentario SET 
                    contenido = '$data->contenido',
                    usuario_idusuario = '$data->usuario_idusuario',
                    nota_idnota = '$data->nota_idnota'
                ";

        $res_query = mainModel::ejecutar($query);

        if($res_query->rowCount() >= 1){
            $eval = true;
            $msj_sys["m1"] = "Se inserto comentario";
        }

        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];

    }


    protected function getComentariosNota_Model($data){
        $data_res = [];
        $eval = false;
        $msj_sys = [];

        $msj_sys["m1"] = "No hay comentarios";

        $query = "SELECT  comentario.contenido, usuario.idusuario, usuario.nombre, usuario.apellido, usuario.url_foto 
                    FROM comentario INNER JOIN usuario 
                    ON comentario.usuario_idusuario = usuario.idusuario
                    WHERE nota_idnota = '$data->nota_idnota'
                ";

        $res_query = mainModel::ejecutar($query);

        if($res_query->rowCount() >= 1){
            $eval = true;
            $msj_sys["m1"] = "hay comentarios";
            while ($registro =  $res_query->fetch(PDO::FETCH_ASSOC)) {
                # code...
                $data_res[] = $registro;
            }

        }

        return [ "eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res ];

    }



    /**
     * 
     */
    protected function updateUrlFoto_Model($data){
        $eval = false;
        $data_res = [];
        $msj_sys = [];
        $msj_sys["m1"] = "No se actualiz?? url foto";


        $query = "UPDATE usuario SET url_foto = '$data->url_foto' WHERE idusuario = '$data->idusuario'";

        $response = mainModel::ejecutar($query);

        if($response->rowCount() >= 1){
            $eval = true;
            $msj_sys['m1'] = "Se actualiz?? url foto";

            $res_session = $this->actualizarSession_Model();
            $msj_sys["m2"] = $res_session["msj"];
            
        }

        return ["eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res];

    }


    protected function actualizarSession_Model(){
        $eval = false;
        $msj_sys = 'No se actualiz?? sessi??n';
        $idusuario = $_SESSION['data']['idusuario'];
        $res_user = $this->obtenerUsuario_Model($idusuario);

        if($res_user['eval']){
            $_SESSION['data'] = $res_user['data'];
            $eval = true;
            $msj_sys = 'Se actualiz?? sessi??n';

        }

        return ['eval'=>$eval, "msj"=>$msj_sys];
    }

    /**
     * 
     */
    protected function obtenerUsuario_Model($idusuario){
        $eval = false;
        $data_res = []; 
        $msj_sys = "No se obtuvo usuario";
        
        $query = "SELECT * FROM usuario WHERE idusuario = '{$idusuario}' LIMIT 1";

        $res_query = mainModel::ejecutar($query);

        if($res_query->rowCount() >= 1){
            $eval = true;
            $msj_sys = "Se obtuvo el usuario";

            $data_res = $res_query->fetch(PDO::FETCH_ASSOC); 
        }

        return ['eval'=>$eval, 'data'=>$data_res, 'msj'=>$msj_sys ];
    }


    /**
     * 
     */
    protected function updatePerfilData_Model($data){
        $eval = false;
        $data_res = [];
        $msj_sys = [];

        $msj_sys["msj1"] = "No se actualizoo";

        $query = "UPDATE usuario SET 
                    email = '{$data->email}',
                    nombre = '{$data->nombre}',
                    apellido = '{$data->apellido}',
                    fecha_nacimiento = '{$data->fecha_nacimiento}'
                    WHERE idusuario = '{$data->idusuario}' ";

        $result = mainModel::ejecutar($query);

        if($result->rowCount() >= 1){
            $eval = true;
            $msj_sys["msj1"] = "Se actualiz??";

            //se actualiza el session
            $res_user = $this->obtenerUsuario_Model($data->idusuario);
            $msj_sys["msj2"] = $res_user["msj"];

            if($res_user["eval"]){
                $_SESSION["data"] = $res_user["data"];
            }
        }

        return ["eval"=>$eval, "msj"=>$msj_sys, "data"=>$data_res];

    }

    /**
     * $tipo_nota => 
     * 0:eliminado
     * 1:privado
     * 2:public
     * 
     * $privado =>
     * true: obtener notas privadas,
     * false: obtener notas publicas
     */
    protected function obtenerNotasPublicas_Model($idusuario, $tipo_nota, $privado){
        $eval = false;
        $data_res = [];
        $msj_sys = "No se obtuvo las notas";
        

        if($privado === 0){
            // trae todas las notas de todos los usuarios, pero solo privado o solo pulbico, no ambos
            $query = "SELECT nota.*, usuario.nombre, usuario.apellido, usuario.url_foto as url_foto_user 
                        FROM nota inner join usuario 
                        on nota.usuario_idusuario = usuario.idusuario 
                        WHERE nota.estado = $tipo_nota 
                        ORDER BY nota.fecha_publicacion DESC
                    ";
        }
        elseif($privado === 1){
            // trae las notas de un solo usuario, pero solo privado o solo pulbico, no ambos
            $query = "SELECT nota.*, usuario.nombre, usuario.apellido, usuario.url_foto as url_foto_user 
                        FROM nota inner join usuario 
                        on nota.usuario_idusuario = usuario.idusuario 
                        WHERE nota.estado = $tipo_nota 
                        AND usuario.idusuario = '$idusuario'
                        ORDER BY nota.fecha_publicacion DESC
                    ";
        }
        else{
            // $privado === 2
            // trae las notas de un solo usuario, con las notas publicas y privadas 
            $query = "SELECT nota.*, usuario.nombre, usuario.apellido, usuario.url_foto as url_foto_user 
                        FROM nota inner join usuario 
                        on nota.usuario_idusuario = usuario.idusuario 
                        WHERE usuario.idusuario = '$idusuario'
                        ORDER BY nota.fecha_publicacion DESC
                    ";
            
        }


        $res_query = mainModel::ejecutar($query);
        if($res_query->rowCount() >= 1){
            $objcant = new StdClass;
            while ($elem_doc = $res_query->fetch(PDO::FETCH_ASSOC)) {

                $objcant->nota_idnota = $elem_doc['idnota'];
                $data_like = $this->getLikesNote_Model($objcant); 
                $cant = ["cantlike"=>$data_like["data"]["cant"]];

                $data_res[] = array_merge($elem_doc, $cant);
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
     * consulta verificar email N??1
     */
    public function verifyEmail_Model($data){
        $query = "SELECT * FROM usuario WHERE email='{$data->email}' LIMIT 1";

        $res = mainModel::ejecutar($query);
        
        $eval = false;

        if($res->rowCount() > 0){

            $user = $res->fetch(PDO::FETCH_ASSOC);

            $_SESSION["retrive"] = true;
            $_SESSION["app"] = true;
            // $_SESSION["email"] = $user['email'];
            $_SESSION["idusuario"] = $user['idusuario'];
            $eval = true;                
        }
        return $eval;

    }
    /**
     * consulta verificar preguntas N??2
     */
    public function verifyPregunta_Model($data){

        $val = false;
        $msj = "no existe";

        //$verificar = $this->consultar_registro($data->idusuario);

        //if($verificar["eval"] == true){
            
            //$val = false;
            //$msj = "ya existe";

           $query = "SELECT * from retrive_password
                     where usuario_idusuario='{$data->idusuario}'
                      and  pregunta = 'cual es tu color favorito' 
                      and respuesta='{$data->respuesta1}'
                ";

            $res = mainModel::ejecutar($query);

            $query1 = "SELECT * from retrive_password
                        where usuario_idusuario='{$data->idusuario}'
                        and  pregunta = 'cual es el nombre de tu mascota' 
                        and respuesta='{$data->respuesta2}'
                ";
                 
            $res1 = mainModel::ejecutar($query1);

            if( $res->rowCount() > 0 && $res1->rowCount() > 0 ){
                $val = true;
                $msj = "si existe respuesta";
            }
            
        //}
        return ["val" => $val, "msj" => $msj];
        
    }
        /**
     * 
     */
    public function updatePass_Model($data){
        $eval = false;
        $msj = "no se actualizo";

        $passEncriptado=mainModel::encriptar($data->password);

        $query = "UPDATE usuario
                    SET password = '{$passEncriptado}' 
                    WHERE idusuario = '{$data->idusuario} ' 
            ";
        
        $res = mainModel::ejecutar($query);
        
        if( $res->rowCount() > 0 ){
            $eval = true;
            $msj = "se actualizo la contrase??a";
        }

        if($eval){
            session_destroy();
        }

        return ["eval" => $eval, "msj" => $msj];

    }

    /**
     * 
     */
    public function login_Model($data){

        $msj_sys = "El usuario no existe";
        $eval = false;

        $query = "SELECT * FROM usuario WHERE email='{$data->email}'";

        $res = mainModel::ejecutar($query);        

        if($res->rowCount() > 0){
            while ($usuario = $res->fetch(PDO::FETCH_ASSOC)) {
                # code...
                if(mainModel::verificar_password($data->password, $usuario["password"])){
                    // session_start();
                    $_SESSION["app"] = true;
                    $_SESSION['retrive'] = false;
                    $_SESSION["data"] = $usuario;

                    $msj_sys = "el usuario existe";
                    $eval = true;
                }
                
            }
        }
        return ["eval"=>$eval, "msj"=>$msj_sys];
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
                                                fecha_nacimiento = '{$data->fecha_nacimiento}',
                                                url_foto = '{$data->url_foto}',
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

