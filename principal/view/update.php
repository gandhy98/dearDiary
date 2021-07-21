<?php
    require_once("../../config/conexion.php");
    include_once("../../modules/session_start.php");

    // var_dump($_GET); // prueba 
  
    /**
     * *relacion **1 (id)
     * este dato se trae desde el archivo principal.php
     * es el id de una de las notas
     * 
     */

    $id= $_GET['id'];

    /**
     * Obteniendo UNA nota, utilizando el ID que se obtiene mediante el metodo GET
     */
    // 1. Consulta sql para traer nota
    $sql="SELECT * FROM  notas_diario WHERE idnotas_diario='$id'";
    // 2. ejecutando la consulta 
    $result_sql = mysqli_query($conexion,$sql);

    // Evaluando el resultado de la consulta. Si no hay resultados redirecciona a la pagina Principal.php
    if(mysqli_num_rows($result_sql) < 1){
        echo '<script>           
                alert("La nota no existe");
                window.location ="../principal.php";
                </script>';//
        exit();
    }

    // 3. Recorriendo el resultado de la consulta (*SELECT)
    $titulo_n = "";
    $descripcion_n = "";
    $fecha_n = "";
    while($fila = $result_sql->fetch_object()){
        $titulo_n = $fila->titulo;
        $descripcion_n = $fila->descripcion;
        $fecha_n = $fila->fecha;
    }
?>
    
    
    <?php
        /**
         * NAVEGACION DE LA PÁGINA
         */
        $ruta_llegada = "../../";
        $ruta_menu = "../";
        include_once("../../partials/navegacion_usuarios.php");
    ?>
    <h1>ESCRIBIR LAS NOTAS</h1>
    <main>
        <div>
                <!-- 
                    * relacion **1 (id)
                    * se envian los datos para su actualización al archivo (procesar_update.php), despuúes de que el usuario modifique los datos del form
                 -->
                <form action="../procesar_update.php?idParaUpdate=<?=$id?>" method="post">
                    <div>
                        <input type="hidden" value="<?=$id?>" name="id_input">
                        <input type="text" name="titulo" value="<?=$titulo_n?>" placeholder="ingresa titulo">
                        <input type="date" name="fecha" value="<?=$fecha_n?>">
                    </div>
                    <div>
                        <textarea name="descripcion" rows="10">
                            <?=$descripcion_n?>
                        </textarea>
                    </div>
                    <div>

                        <input type="submit" value="GUARDAR">
                        <a href="../principal.php">cancelar</a>
                    </div>
                </form>
        </div>
    </main>


