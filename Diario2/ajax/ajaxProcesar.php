<?php
// para los procesos antes de pasarlo a php
    $conAjax = true;

    include_once("../controllers/adminController.php");
    $datos = json_decode($_POST["data"]);

    $obj_gandhy = new adminController();


    $suma = 2 + $datos->numero;

    echo json_encode($obj_gandhy->testController($datos->nombre));
