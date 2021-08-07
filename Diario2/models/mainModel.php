<?php
 //aqui hacemos las funciones
$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../core/configMain.php";
}else{
    require_once "./core/configMain.php";
}

class mainModel
{

    /* Funcion para conectar a la BD - Function to connect to DB */
    protected function conexion_db(){
        $link = new PDO(SGBD,USER,PASS);//array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        $link->exec("set names utf8");
        return $link;
    }

    /* Funcion para ejecutar una consulta simple - Function to execute a simple query */
    public function ejecutar($query){
        $response = self::conexion_db()->prepare($query);
        $response->execute();
        return $response;
    }


    public function encriptar($str){
        return password_hash($str, PASSWORD_DEFAULT);
    }

    public function verificar_password($password, $hash){
        return password_verify($password, $hash);
    }

}
