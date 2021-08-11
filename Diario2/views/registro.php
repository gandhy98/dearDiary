<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once ("./views/modules/header.html");
    ?>
    <title>REGISTRO | DIARY </title>
</head>
<body>
    
    <!--encabezado -->
    <!-- Navegacion session -->
    <?php
        include_once ("./views/pages/nav_session.html");
    ?>

    <section class="login-cuerpo">
        <div class="contenido borde">
            <h1 class="titulo margenes centrar txtregi">REGISTRATE </h1>
            <nav>
                <form action="#" method="post" class="">

                    <input type="text" class="input1 margenes txtNombre" value="" name="nombre" placeholder="Ingrese Nombre" > <br>
                    <input type="text" class="input1 margenes txtApellido" name="apellido" placeholder="Ingrese Apeliido"> <br>
                    <input type="email" class="input1 margenes txtCorreo" name="correo" placeholder="Gmail"> <br>
                    <input type="password" class="input1 margenes txtPassword" name="password" placeholder="crear password"> <br>
                    <input type="password" class="input1 margenes txtPassword2" name="confir_password" placeholder="confirme password"> <br>

                    <label for="exampleFormControlInput1" class="form-label"> por si te olvidas tu contraseña...</label>
                    <label for="exampleFormControlInput1" class="form-label">¿cual es tu color favorito?</label>
                    <input type="text" class="input1 margenes txtNombre" value="" name="nombre" placeholder="color favorito" > <br>
                    <label for="exampleFormControlInput1" class="form-label">¿nombre de tus mascota?</label>
                    <input type="text" class="input1 margenes txtApellido" name="apellido" placeholder="nombre de tu mascota"> <br>

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