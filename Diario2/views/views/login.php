<!doctype html>
<html lang="es">
  <head>
    
    <!-- header links -->
    <?php
        include_once ("./views/modules/header.html");
    ?>
    
    <title>LOGGIN | DIARY</title>
  </head>
  <body>


    <!-- CONTENIDO DE LA PÁGINA -->
    <!-- Navegacion session -->
    <?php
        include_once ("./views/pages/nav_session.html");
    ?>
    
    <section class="login-cuerpo">
        <div class="contenido borde">
            <h1 class="titulo margenes centrar">INICIAR SECION</h1>
            <nav>
                <form action="#" method="post" class="">

                    <input type="email" class="input1 logCorreo" name="correo" placeholder="ingresa Gmail"> <br>
                    <input type="password" class="input1 margenes logPassword" name="password" placeholder="ingresa password"> <br>
                    <input type="checkbox" name="recuerdame"> <br>
                    <div class="margenes centrar">
                        <input type="submit" class="boton" onClick="ingresar_login()" value="INGRESAR">
                    </div>
                </form>
            </nav>
            <p class="centrar">
                ¿no tienes una cuenta? <br>
                <a href='?app=registro' class="color_especial">registrate</a> <br>
                <!--<a href="forgot_password.html" class="color_especial">olvido su password?</a>-->
            </p>
                <!-- boton notas -->
                <div class="margenes centrar">
                    <button type="button" class="bton2 " data-bs-toggle="modal" 
                        data-bs-target="#verificarCorreo"    
                    >
                        ¿olvido su password?
                    </button>
                </div>
           
            <!-- Modal agregar nota -->
            <?php
                include("./views/components/recuperarPass.html");
            ?>


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