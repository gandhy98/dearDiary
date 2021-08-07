<!doctype html>
<html lang="es">
    <head>
        
        <!-- header links -->
        <?php
            include_once ("./views/modules/header.html");
        ?>
        
        <title>PORTADA | DIARY</title>
    </head>
    <body >
        
        <div class="portada">
            <!-- Navegacion session -->
            <?php
                include_once ("./views/pages/nav_session.html");
            ?>
            <!-- CONTENIDO DE LA PÁGINA -->
            <div class="contenedor">
                <h1 class="titulo"><span class="text-color">BIENVENIDO</span> A DEAR DIARY</h1>
                <h3 class="frase">has que cada dia valga </h3>

                <div class="content-btns">
                    <a href="?app=login" class="btn m-r">iniciar sesion</a>
                    <a href="?app=registro" class="btn m-l">registrate</a>
                </div>
            </div>
            <!-- Footer pages -->
        </div>
        
        <?php
            include_once ("./views/pages/footer.html");
        ?>

        <!-- Footer links -->
        <?php
            include_once ("./views/modules/footer.html");
        ?>

    </body>
</html>