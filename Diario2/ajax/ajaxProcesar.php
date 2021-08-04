<?php
// para los procesos antes de pasarlo a php
    $conAjax = true;

    $datos = json_decode($_POST["data"]); 

    include_once("../controllers/adminController.php");
    

    $obj_gandhy = new adminController();


    /*$suma = 2 + $datos->numero;

    echo json_encode($obj_gandhy->testController($datos->nombre));*/

    if($datos->id === "registro"){

        $response = $obj_gandhy->registrar_Controller($datos);

        echo json_encode($response);

    }
    
    else if ($datos->id === "login"){

        $response = $obj_gandhy->login_Controller($datos);

        echo json_encode($response);
    }

    else{

        echo json_encode("el id no es valido");
    }