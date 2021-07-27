<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
            include_once("./views/pages/nav_session.hatml");
        ?>
        <title>SIGN UP</title>
    </head>

    <body>
        <!--encabezado -->
        <!-- Navegacion session -->
        <?php
            include_once ("./views/pages/nav_session.html");
        ?>

        <section class="login-cuerpo">
            <div class="contenido borde">
                <h1 class="titulo margenes centrar">REGISTRATE </h1>
                <nav>
                    <form action="#" method="post" class="">

                        <input type="text" class="input1 margenes txtNombre" name="nombre" placeholder="Ingrese Nombre"> <br>
                        <input type="text" class="input1 margenes txtApellido" name="apellido" placeholder="Ingrese Apeliido"> <br>
                        <input type="email" class="input1 margenes txtCorreo" name="correo" placeholder="Gmail"> <br>
                        <input type="password" class="input1 margenes txtPassword" name="password" placeholder="crear password"> <br>
                        <input type="password" class="input1 margenes txtPassword2" name="confir_password" placeholder="confirme password"> <br>

                        <div class="margenes centrar ">
                            <input type="submit" class="boton" onClick="registarse();" value="Registrate">
                        </div>

                    </form>
                </nav>

                <p class="centrar">
                    si ya tienes una cuenta <br>
                    <a href="?app=login" class="color_especial">inicia Sesion</a>
                </p>

            </div>
        </section>

        <?php
            include_once ("./views/pages/footer.html");
        ?>

        <!-- Footer links -->
        <?php
            include_once ("./views/modules/footer.html");
        ?>

    </body>

</html>