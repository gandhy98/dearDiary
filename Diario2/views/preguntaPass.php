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
            <h1 class="titulo margenes centrar txtregi">PREGUNTAS DE SEGURIDAD </h1>
            <nav>
                <form action="#" method="post" class="">

                    <label for="exampleFormControlInput1" class="form-label"> por si te olvidad tu password...</label> <br> <br>
                    <label for="exampleFormControlInput1" class="form-label">¿CUAL ES TU COLOR FAVORITO?</label>
                    <input type="text" class="input1 margenes txtPregunta1" value="" name="nombre" placeholder="color favorito" > <br>
                    <label for="exampleFormControlInput1" class="form-label">¿CUAL ES EL NOMBRE DE TU MASCOTA?</label>
                    <input type="text" class="input1 margenes txtPregunta2" name="apellido" placeholder="nombre de tu mascota"> <br>
                    <!--js_registro insertPregunta-->
                    <div class="margenes centrar ">
                        <input type="submit" class="boton" onClick="insertPregunta()" value="guardar respuesta">
                    </div>

                </form>
            </nav>

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