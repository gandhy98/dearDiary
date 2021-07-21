<?php

	/*const SERVER="localhost";
	const DB="mydb";
	const USER="root";
	const PASS="";


	// Solo modificar la siguiente línea en caso el gestor de base de datos no sea MySQL
	//Only modify the following line in case the database manager is not MySQL
	const SGBD="mysql:host=".SERVER.";port=3309;dbname=".DB;


    function connect(){
        $link= new PDO(SGBD,USER,PASS);//array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        $link->exec("set names utf8");
        return $link;
    }
*/
    // function execute_single_query($query){
    //     $response = connect()->prepare($query);
    //     $response->execute();
    //     return $response;
    // }

    // $conexion = connect();
    // $query=$conexion->query("SELECT * FROM usuario WHERE 1");
    // $result = execute_single_query($query);
    // $arreglo = array();
    // while ($re=$result->fetch_array(MYSQL_NUM())){
    //     $arreglo[]= $re;
    // }

   /* var_dump(connect());*/

   require_once("../config/conexion.php"); 
   include "../login/login.php"; 
    session_start();
    $data = $_SESSION["data"];
    var_dump($data->apellido);


    //ejecutado
    while($fila=mysql_fetch_array[$ejecutado]){
        echo $fila["nombre"];
    }



///////////////////////////////////////
// require_once("../modules/session_start.php");
// require_once('../config/conexion.php');
// //$_S
// $data = $_SESSION["data"];
// var_dump ($data->nombre);
// $nombre = $data->nombre;
// echo $nombre;
// //echo "hello otro";
// setcookie("nombre", $nombre);
// echo "<hr>";
// echo '¡Hola ' . htmlspecialchars($_COOKIE["nombre"]) . '!';




// set the cookies
//setcookie("idusuario",,time() + 3600);
//setcookie("edad", "20", time() + 3600);


// eliminando cookie
// setcookie("dato", "", time() - 3600);


//echo $_COOKIE["idusuario"]);

/*if(isset($_COOKIE[$correo]){
    $cont=$_COOKIE[$correo];
    setcookie("nombre_usuario",$cont + 1, time() + 3600);
}
else{
    setcookie("nombre_usuario", 1, time() + 3600);
}

<h1>hola <?php echo $_SESSION['usuario'];?> has ingresado <?php echo $_COOKIE[$_SESSION['usuario'] ];?> </h1>
*/

/*$query_nota = "SELECT * FROM notas_diario WHERE usuario_idusuario = $data->idusuario AND (titulo LIKE '%{$buscar_nota}%' OR descripcion LIKE '%{$buscar_nota}%')  AND fecha LIKE '%{$buscar_fecha}%'";*/


