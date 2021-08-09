<!doctype html>
<html lang="es">
    <head>
        
        <!-- header links -->
        <?php
            include_once ("./views/modules/headerPrin.html");
        ?>
        
        <title>NOTAS | DIARY</title>
</head>
<body>
    <main>  
        <div>
            <form action="../notas.php" method="post">
                <div>
                    <input type="text" name="titulo" placeholder="ingresa titulo">
                    <input type="date" name="fecha">
                </div>
                <div>
                    <textarea name="descripcion" rows="5"></textarea>
                </div>
                <div>
                    <input type="submit" value="GUARDAR">
                    <a href="../principal.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>
     <!-- Footer links -->
   <?php
        include_once ("./views/modules/footer.html");
    ?> 
</body>