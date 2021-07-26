<?php


/**
 * mensaje para el usuario
 * 
 */
function mensaje_usuario($msj, $ruta){
    return "<script>           
                alert('$msj');
                window.location ='$ruta';
            </script>
            ";//
}