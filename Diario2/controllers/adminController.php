<?php

$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../models/adminModel.php";
}else{
    require_once "./models/adminModel.php";
}

class adminController extends adminModel
{

    /**
     * MODULO VISITA PERFIL
     */
    public function obtenerPerfilVisita_Controller($idusuario_v){
        $dataModel = new StdClass;
        $dataModel->idusuario = $idusuario_v;
        
        $result = self::obtenerUsuario_Model($dataModel->idusuario);

        return $result;
    }


    /**
     * MODULO COMENTARIOS
     */

    public function insertarComentario_Controller($data){
        $dataModel = new StdClass;
        $dataModel -> contenido = $data->txt_comentario;
        $dataModel -> usuario_idusuario = $_SESSION["data"]["idusuario"];
        $dataModel -> nota_idnota = $data->txt_idnota;

        $res = self::insertarComentario_Model($dataModel);

        return $res;
    }

    public function getComentariosNota_Controller($data){
        $dataModel = new StdClass;
        $dataModel -> nota_idnota = $data->idnota;

        $res = self::getComentariosNota_Model($dataModel);

        return $res;
    }




    /**
     * 
     */
    public function updateUrlFoto_Controller(){
        $dataModel = new StdClass;
        $dataModel->idusuario = $_SESSION['data']['idusuario'];
        $dataModel->url_foto = "perfil_{$_SESSION['data']['idusuario']}.jpg";

        $res = self::updateUrlFoto_Model($dataModel);

        return $res;
    }

    /**
     * 
     */
    public function updatePerfilData_Controller($data){
        $dataModel = new stdClass;
        $dataModel->nombre = $data->nombre;
        $dataModel->apellido = $data->apellido;
        $dataModel->email = trim($data->email); 
        $dataModel->fecha_nacimiento = $data->fecha_nacimiento;

        $dataModel->idusuario = $_SESSION["data"]["idusuario"];


        $res = self::updatePerfilData_Model($dataModel);

        return $res;

    }

    /**
     * 
     */
    public function obtenerNotasPublicas_Controller(){
        $result = self::obtenerNotasPublicas_Model();
        return $result;
    }
    /**
     * 
     */
    public function insertarNota_Controller($data){

        $dataModel = new StdClass;

        $dataModel->titulo = $data->titulo;
        $dataModel->contenido = $data->contenido;
        $dataModel->fecha_publicacion = "current_timestamp()";
        $dataModel->url_foto = $data->url_foto;
        $dataModel->estado = $data->estado;
        $dataModel->usuario_idusuario = $_SESSION['data']['idusuario'];

        $res = self::insertarNota_Model($dataModel);

        return $res;

    }
    /**
     * 
     */
    public function verifyEmail_Controller($data){
        $dataModel = new stdClass;
        //verificaremos si necesitamos la session
        $dataModel -> email = $data-> txtVerificarCorreo;

        $response = adminModel::verifyEmail_Model($dataModel);

        return $response;
    }
    /**
     * 
     */
    public function insertPregunta_Controller($data){
        $dataModel = new stdClass;
        $dataModel->respuesta1 = $data-> txtColor;
        $dataModel->respuesta2 = $data-> txtMascota;
        $dataModel->idusuario = $_SESSION['data']['idusuario'];
        $dataModel->estado= 1;

        
        $response = adminModel::insertPregunta_Model($dataModel);

        return $response;
    }
    /**
     * 
     */
    public function login_Controller($data){
        $dataModel = new StdClass;
        $dataModel->email = $data->logCorreo;
        $dataModel->password = $data->logPassword;

        $response = adminModel::login_Model($dataModel);

        return $response;

    }

    /**
     * 
     */
    public function registrar_Controller($data){

        $dataModel = new stdClass;
        $dataModel -> email = $data->txtCorreo;
        $dataModel -> password = $data->txtPassword;
        $dataModel -> nombre =$data->txtNombre;
        $dataModel -> apellido = $data->txtApellido;
        $dataModel -> fecha_nacimiento = '2000-12-12';
        $dataModel -> url_foto = 'test.jpg';
        $dataModel -> estado = 1;

        $respuesta = adminModel::registrar_Model($dataModel);

        return $respuesta;

    }
    


    /**
     * 
     */
    private function verificar_session(){
        if(!empty($_SESSION) && $_SESSION["app"] === true ){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 
     */
    public function pagina_Controller($intro_app){
        
        $arr_app = ["portada"];
        
        if($this->verificar_session()){

            $arr_app = array_merge($arr_app, ["perfil_visit","perfil", "principal","salir","notas", "m_test/main"]);

            if(in_array($intro_app, $arr_app)){
                return $intro_app.".php";
            }else{
                return "principal.php";
            }

        }else{
            $arr_app = array_merge($arr_app, ["login", "registro","recuperarPass"]);
            if(in_array($intro_app, $arr_app)){
                return $intro_app.".php";
            }else{
                return "login.php";
            }
        }

    }
    
    public function testController($nombre){
        return "response $nombre";
    }

}
