<?php
// 2)
$conAjax = is_null($conAjax)?false:$conAjax;
if($conAjax){
    require_once "../core/configMain.php";
}else{
    require_once "./core/configMain.php";
}

class mainModel
{

    /* Funcion para conectar a la BD  */
    protected function conexion_db(){
        $link = new PDO(SGBD,USER,PASS);//array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        $link->exec("set names utf8");
        return $link;
    }

    /* Funcion para ejecutar una consulta simple de la base o para que lo lea */
    public function ejecutar($query){
        $response = self::conexion_db()->prepare($query);
        $response->execute();
        return $response;
    }

}