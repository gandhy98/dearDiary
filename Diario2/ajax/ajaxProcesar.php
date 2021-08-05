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

    else {

        echo json_encode("El id no es valido");

    }

