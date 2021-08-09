<?php

    $conAjax = true;

    $datos = json_decode($_POST["datas"]);

    include_once("../controllers/adminController.php");

    $obj_gandhy = new adminController();


    if($datos->id === "registro"){

        $response = $obj_gandhy->registrar_Controller($datos);

        echo json_encode($response);

    }
    
    else if ($datos->id === "login") {
        # code...

        $response = $obj_gandhy->login_Controller($datos);
        
        echo json_encode($response);
    }

    else if($datos->id === "salir"){

        session_start();
        
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

    else {

        echo json_encode("El id no es valido");

    }

