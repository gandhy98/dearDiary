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

    else if ($datos->id === "verifyEmail"){
        
        $response = $obj_gandhy->verifyEmail_Controller($datos);

        echo json_encode($datos);
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

