<?php 
    session_start();
    
    error_reporting(0);

    $conAjax = false;
    
    /**
     * Clases del proyecto
    */
    require_once("./controllers/adminController.php");


    $obj = new adminController();

    $result_app = $obj -> pagina_Controller($_GET["app"]);

    include_once("./views/$result_app"); //controlar entradas
 