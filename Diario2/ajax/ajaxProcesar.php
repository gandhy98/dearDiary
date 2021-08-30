<?php

    session_start();

    $conAjax = true;

    $datos = json_decode($_POST["datas"]);

    include_once("../controllers/adminController.php");

    $obj_gandhy = new adminController();


    if($datos->id === "registro"){

        $response = $obj_gandhy->registrar_Controller($datos);

        echo json_encode($response);

    }

    /**
     * MODULO SEGUIDOR
     */
    elseif ($datos->id === "seguir-perfil"){
        $response = $obj_gandhy->seguirPerfil_Controller($datos);
        echo json_encode($response);
    }

    elseif ($datos->id === "state-seguidor") {
        # code...

        $response = $obj_gandhy -> siguiendoPerfil_Controller($datos);

        echo json_encode($response);
    }

    /**
     * GET LIKES
     */
    elseif ($datos->id === "get-like") {
        # code...
        $response = $obj_gandhy->getLikesNote_Controller($datos);
        echo json_encode($response);
    }


    /**
     * ADD LIKE
     */
    elseif ($datos->id === "add-like") {
        # code...

        $response = $obj_gandhy->addlikeNote_Controller($datos);

        echo json_encode($response);
    }

    /**
     * INSERTANDO COMENTARIOS
     */
    elseif ($datos->id === "insertar-comentario") {
        # code...
        $response = $obj_gandhy -> insertarComentario_Controller($datos);
        echo json_encode($response);
    }

    elseif ($datos->id === "obtener-comentarios") {
        # code...
        $res = $obj_gandhy -> getComentariosNota_Controller($datos);
        echo json_encode($res);
    }

    elseif ($datos->id === "upload-fotoPerfil") {
        # code...
        $datos->foto = $_FILES["img_foto"];

        $msj = [];
        $result = [];

        $result['eval1'] = false;

        $res_foto = move_uploaded_file($datos->foto["tmp_name"], "./../public/img_perfil/perfil_{$_SESSION['data']['idusuario']}.jpg");

        if($res_foto){
            $result['eval1'] = true;
            
            $result['msj']["m1"]= "Se guardo la foto";
            
            $res = $obj_gandhy -> updateUrlFoto_Controller();
            $result['msj']["m2"] = $res["msj"];
            $result["eval2"] = $res["eval"];
        } 

        echo json_encode($result);
    }

    else if ($datos->id === "updateData_perfil") {
        # code...
        $response = $obj_gandhy->updatePerfilData_Controller($datos);

        echo json_encode($response);
    }
    /*email para recuperar pasword N°1*/
    else if ($datos->id === "verifyEmail"){
        
        $response = $obj_gandhy->verifyEmail_Controller($datos);
    
        echo json_encode($response);
    }
    /*verificando las preuntas N°2*/
    else if ($datos->id === "verifyPregunta"){

        $response = $obj_gandhy->verifyPregunta_controller($datos);

        echo json_encode($response);
    }
    /*email para recuperar pasword N°3*/
    else if($datos->id === "updatePass"){

        $response = $obj_gandhy->updatePass_controller($datos);

        echo json_encode($response);
    }
    else if ($datos->id === "addQuestion") {
        # code...
        
        $response = $obj_gandhy->insertPregunta_Controller($datos);

        echo json_encode($response);
        // echo json_encode($datos);
    }

    else if ($datos->id === "login") {
        # code...

        $response = $obj_gandhy->login_Controller($datos);
        
        echo json_encode($response);
    }

    elseif ($datos-> id === "editarPerfil"){
        $datos-> imgPerfil = $_FILES["img_perfil"];
        $result =new stdClass;

        $datos->url_foto = $_SESSION["data"]["idusuario"]."_".time().".jpg";

        $resperfil= $obj_gandhy -> editarPerfil_controller($datos);

        $result->msj[] = $resPerfil["msj"];
        $result->msj[] = $resPerfil["eval"];

        if($resPerfil["eval"]){
            $msj = "No se guardo imagen";
            $eval = false;
            $resultado = move_uploaded_file($datos->imgPerfil['tmp_name'], "./../views/public/img_perfil/" . "{$datos->url_foto}");
            if($resultado){
                $eval = true;
                $msj = "Se guardo imagen";
            }
            
            $result->msj[] = $msj;
            $result->eval = $eval;
        }

        echo json_encode($result);
    }

    elseif ($datos->id === "insert-nota") {
        # code...
        // recepcionando la imagen de la nota
        $datos->imgNota = $_FILES["img_nota"];

        $result = new StdClass;

        $datos->url_foto = $_SESSION["data"]["idusuario"] ."_". time() . ".jpg";
        
        $resnota = $obj_gandhy -> insertarNota_Controller($datos);

        $result->msj[] = $resnota["msj"];
        $result->eval = $resnota["eval"];
        
        if($resnota["eval"]){
            $msj = "No se guardo imagen";
            $eval = false;
            $resultado = move_uploaded_file($datos->imgNota['tmp_name'], "./../public/img_note/" . "{$datos->url_foto}");
            if($resultado){
                $eval = true;
                $msj = "Se guardo imagen";
            }
            
            $result->msj[] = $msj;
            $result->eval = $eval;
        }

        echo json_encode($result);
    }

    else if($datos->id === "salir"){

        // session_start();
        
        if(session_destroy()){
            $response = true;
        }else{
            $response = false;
        }

        echo json_encode($response);
    }
    else if($datos->id === "entrarNotas"){
        if( $datos->id == "entrarNotas"){
            $response=true;
        }
        else{
            $response=false;
        }
        echo json_encode($response);
    }

    else if($datos->id === "insertarNotas"){
        $response = $obj_gandhy->insertarNotas_Controller($datos);

        echo json_encode($response);
    }

    else {

        echo json_encode("El id no es valido");

    }

