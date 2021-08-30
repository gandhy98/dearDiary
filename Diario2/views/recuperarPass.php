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
            <h1 class="titulo margenes centrar txtregi">DIGITE NUEVA CONTRASEÑA </h1>
            <nav>
                <form action="#" method="post" class="">
                    <input type="password" class="input1 margenes txtRecPassword" name="password" placeholder="crear password"> <br>
                    <input type="password" class="input1 margenes txtRecPassword2" name="confir_password" placeholder="confirme password"> <br>

                    <div class="margenes centrar ">
                        <input type="submit" class="boton" onclick="updatePass()" value="GUARDAR"> <!--TEMPORAL salir()-->
                    </div>

                </form>
        </div>
    </section>

    <?php
        // var_dump($_SESSION);
        include_once ("./views/pages/footer.html");
    ?>

    <!-- Footer links -->
    <?php
        include_once ("./views/modules/footer.html");
    ?>


</body>
</html>