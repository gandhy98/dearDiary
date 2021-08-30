<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once ("./views/modules/header.html");
    ?>
    <title>RECUPERAR PASSWORD | DIARY </title>
</head>
<body>
    
<!--TENEMOS QUE MODIFICAR EL PASWORD EXISTENTE-->
<section class="login-cuerpo">
        <div class="contenido borde">
            <h1 class="titulo margenes centrar txtregi">responde las preguntas</h1>
            <nav>
            <form action="#" method="post" class="">
                    <label for="exampleFormControlInput1" class="form-label">
                        ¿cual es tu color favorito?
                    </label>
                    <input type="text" class="input1 margenes rcpColor" value="" name="nombre" placeholder="color favorito">
                    <br>

                    <label for="exampleFormControlInput1" class="form-label">
                        ¿nombre de tus mascota?
                    </label>
                    <input type="text" class="input1 margenes rcpMascota" name="apellido" placeholder="nombre de tu mascota"> <br>

                    <!--modifica el password-->
                    <div class="margenes centrar ">
                        <input type="submit" class="boton" onclick="verificarRespuesta();" value="siguiente">
                        <!--<input type="submit" class="boton" onclick="cancelar()" value="cancelar">-->
                        <a onclick="cancelar()">cancelar X</a>
                    </div>

                </form>
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
<!--hacer las preguntas-->