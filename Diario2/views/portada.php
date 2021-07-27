<!DOCTYPE html>
<html lang="es">

    <head>
        <!--links header-->
        <?php
            include_once ("./views/modules/header.html");
        ?>
        <title>DEAR DIARY</title>
    </head>

    <body>
        <div class="portada">
            <!--encavezado- navegacion session-->
                <?php 
                    include_once("./views/pages/nav_session.html");
                ?>
            <!--registrarse y iniciar secion -->
            <div class="contenedor">
                <h1 class="titulo"><span class="text-color">BIENVENIDO</span> A DEAR DIARY</h1>
                <h3 class="frase">haz que cada dia valga </h3>

                <div class="content-btns">
                    <a href='?app=login' class="btn m-r">iniciar sesion</a>
                    <a href='?app=signup' class="btn m-l">registrate</a>
                </div>
            </div>
        </div>
        <!-- Footer pages -->
        <?php
            include_once ("./views/pages/footer.html");
        ?>

        <!-- Footer links -->
        <?php
            include_once ("./views/modules/footer.html");
        ?>
    </body>
</html>