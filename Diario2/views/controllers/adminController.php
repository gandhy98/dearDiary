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
        $dataModel -> fecha_nacimiento = '';
        $dataModel -> url_foto = '';
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

            $arr_app = array_merge($arr_app, ["perfil", "principal","salir","notas"]);

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
