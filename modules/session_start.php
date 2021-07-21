<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
            <script> 
                alert("debe iniciar sesion");  
                window.location ="../index.php";           
            </script>
        ';//
        
        //header("location: ../login/view/login.html");
        session_destroy();
        die();
    }




    
?>