<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include_once ("./views/modules/header.html");
    ?>
    <title>LOGGIN | DIARY</title>
</head>
<body>
    <!--encabezado -->
    <!--<nav class="navegacion">
        <a href="../../index.php">
            <img src="../../imagenes/logo.png" width="50px">
        </a>
    </nav>-->
    
    <?php
        include_once ("./views/pages/nav_session.html");
    ?>

    <!-- CONTENIDO DE LA PÁGINA -->
    <!-- Navegacion session -->
    <section class="login-cuerpo">
        <div class="contenido borde">
            <h1 class="titulo margenes centrar">INICIAR SECION</h1>
            <nav>
                <form action="../login.php" method="post" class="">

                    <input type="email" class="input1" name="correo" placeholder="ingresa Gmail"> <br>
                    <input type="password" class="input1 margenes" name="password" placeholder="ingresa password"> <br>
                    <input type="checkbox" name="recuerdame"> <br>
                    <div class="margenes centrar">
                        <input type="submit" class="boton" value="INGRESAR">
                    </div>
                </form>
            </nav>
            <p class="centrar">
                ¿no tienes una cuenta? <br>
                <a href='signup.html' class="color_especial">registrate</a> <br>
                <a href="forgot_password.html" class="color_especial">olvido su password?</a>
            </p>

        </div>
    </section>
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