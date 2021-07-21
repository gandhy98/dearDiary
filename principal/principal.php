<?php 
    //verificar si inicio sesion o no
    include_once("../modules/session_start.php");
    require_once('../config/conexion.php');

    //var_dump($_COOKIE["edad"]); //PRUEBA
    $data = $_SESSION["data"];
    //var_dump ($data->idusuario);
    /**
     * **relacion **1
     * Obtiene los datos por el metodo GET
     * si no existen se evaluan con isset y toman el valor de vacio cuando no están definidos ($_GET['buscar_nota'], $_GET['buscar_fecha'],)
     * 
     */
    $buscar_nota = isset($_GET["buscar_nota"]) ? $_GET["buscar_nota"] : "";
    $buscar_fecha = isset($_GET["buscar_fecha"]) ? $_GET["buscar_fecha"] : "";

    //var_dump($_GET); //prueba
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEAR DIARY</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>

    <main>
        <?php
            // Incluye la estructura html de la navegación
            $ruta_llegada = "../";
            $ruta_menu = "";
            
            include_once("../partials/navegacion_usuarios.php");
            setcookie("nombre", $_SESSION["data"]->nombre, time() + 3600);
        ?>

        <div>
            <!--escribir las notas-->
            <div>
                <a href="view/html_notas.php">¿TIENES ALGO QUE CONTARME?</a>
            </div>
            <!--buscador de las notas-->
            <!--
                **relacion **1 
                SE ENVIAN LOS DATOS POR GET A ESTA MISMA PÁGINA 
            -->
            <div>
                <form action="principal.php" method="get">
                    <input type="text" name="buscar_nota" placeholder="busca tus notas">
                    <input type="date" name="buscar_fecha">
                    <input type="submit" value="BUSCAR">
                </form>
            </div>
            <!--mostrar las notas ecritas-->
            <div>



                <table style="width:100%" border="1">
                <tr>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>FECHA</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>

                <?php 
                    /**
                     * Obteniendo las notas para imprimir en la tabla
                     */
                    // 1. consulata para traer todas las notas, o solo los que se desean a traves del buscador
                    //$query_nota = "SELECT * FROM notas_diario WHERE  titulo LIKE '%{$buscar_nota}%' AND fecha LIKE '%{$buscar_fecha}%' and usuario_idusuario = $data->idusuario ";
                    $query_nota = "SELECT * FROM notas_diario WHERE usuario_idusuario = $data->idusuario AND (titulo LIKE '%{$buscar_nota}%' OR descripcion LIKE '%{$buscar_nota}%')  AND fecha LIKE '%{$buscar_fecha}%'";
                    // 2. ejecutando la consulta
                    $result_consulta = mysqli_query($conexion, $query_nota);
                    
                    // 3. Evaluando si existen resultados 
                    if(mysqli_num_rows($result_consulta) > 0){ //si es mayo a 0 ya encontro una fila igual
                        // 4. Recorriendo las filas o registros del resultado de la consulta
                        while($fila = $result_consulta->fetch_object()){
                           // if($fila->"{usuario_idusuario}")
                ?>
                        <tr>
                            <td>
                                <?php 
                                echo "{$fila->titulo}";
                                ?> 
                            </td>
                            <td>
                                <?php 
                                echo "{$fila->descripcion}";
                                ?> 
                            </td> 
                            <td>
                                <?php 
                                echo "{$fila->fecha}";
                                ?> 
                            </td>
                            <td>                    
                                <!-- 
                                    Este es un link 
                                    redirecciona a la interfaz para modificar la nota
                                    se envia por GET el id de la Nota seleccionada
                                 -->
                                <a href="view/update.php?id=<?=$fila->idnotas_diario?>">ACTUALIZAR</a>
                            </td>
                            <td>                    
                                <!-- 
                                    Este es un link 
                                    se envia por GET el id de la Nota seleccionada PARA SU ELIMINACION
                                 -->
                                <a href="./procesar_delete.php?id=<?=$fila->idnotas_diario?>">DELETE</a>
                            </td>
                        </tr>


                <?php    
                        } // cerrando while
                    } // cerrando if

                ?>

                </table>

            </div>
        </div>
        
        <aside>

        </aside>
        <footer>

        </footer>
    </main>
</body>
</html>