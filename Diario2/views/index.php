<?php
    session_start();
    
    // error_reporting(0);

    $conAjax = false;
    
    /**
     * Clases del proyecto
     */
    require_once("./controllers/adminController.php");


    $obj = new adminController();

    $app = empty($_GET)? "portada" : $_GET["app"]; 

    $result_app = $obj -> pagina_Controller($app);

    include_once("./views/$result_app"); //controlar entradas
    