<?php 
    require_once("../config/conexion.php");
    
    //var_dump(isset($_POST['correo']));
    $correo="";
    $buscar_nota = isset($_POST['correo']) ? $_POST['correo'] : "";
    $verificar_correo=mysqli_query($conexion, "SELECT *FROM usuario WHERE correo='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        $correo = $_POST['correo'];
        $asunto="recuperar contraseña";
        $mensaje= "<p>por favor cree una nueva contraseña <a href='cambiar_password.php'>click aqui</a></p>";
        $header="from: noreply@example.com"."r\n";
        $header="Reply-To: noreply@example.com"."r\n";
        $header="X-Mailer: PHP/". phpversion();
        $email= @mail($correo,$asunto,$mensaje,$header);
        if($email){
            echo "<h4>¡se eivio el correo correctaente, revise en su bandeja!";
        }
    }
    

?>