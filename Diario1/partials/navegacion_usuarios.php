<?php 
    require_once("{$ruta_llegada}config/conexion.php");
    include_once("{$ruta_llegada}modules/session_start.php");

    $data = $_SESSION["data"];

?>

<style>

    .user{
        color:white;
        font-size: 1.2em;
        background:black; 
        text-transform: uppercase;
    }
</style>

<nav>
    <!--hacer barra desplegable-->
    <div >
        <ul>
            <li>
                <a href="<?=$ruta_menu?>principal.php"><img src="<?=$ruta_llegada?>imagenes/logo.PNG" width="50px"></a>
            </li>
            <li><a href="<?=$ruta_menu?>principal.php">INICIO</a></li>
            <li class="user"><?=$data->nombre?></li>
            <li><a>BARRA DESPLEGRABLE</a>
                <ul>
                    <li><a href="<?=$ruta_menu?>principal.php">INICIO</a></li>
                    <li><a href="<?=$ruta_menu?>cerrar_session.php">SALIR</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
