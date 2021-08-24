console.log("se cargo js_login.js")

function verificarRespuesta() {
    event.preventDefault();
    let rcpColor = document.querySelector(".rcpColor").value
    let rcpMascota = document.querySelector(".rcpMascota").value

    envio_ajax({
            id: 'verifyAnswer',
            rcpColor,
            rcpMascota
        }, (res) => {
            console.log(res);
            document.querySelector(".rcpColor").value = "";
            document.querySelector(".rcpMascota")
        },
        './ajax/ajaxProcesar.php'
    );
}

function verficaCorreo() {
    event.preventDefault();
    let txtVerificarCorreo = document.querySelector(".txtVerificarCorreo").value;
    //console.log(txtVerificarCorreo.value)
    envio_ajax({
            id: 'verifyEmail',
            txtVerificarCorreo
        }, (res) => {
            console.log(res);
            //if (res.val) {

            document.querySelector(".txtVerificarCorreo").value = "";
            //location.href = "?app=login";
            /*} else {
                location.href = "?app=login";
            }*/

        },
        './ajax/ajaxProcesar.php'
    );
}


/**
 * 
 */
function ingresar_login() {

    event.preventDefault();

    let logCorreo = document.querySelector(".logCorreo").value;
    let logPassword = document.querySelector(".logPassword").value;

    const jsonData = {
        id: 'login',
        logCorreo,
        logPassword,
    }

    // si los datos ingresados se corresponden al formulario
    if(validarEmail(logCorreo) && logPassword.length != 0 ){
        
        envio_ajax(jsonData, (res) => {
    
                console.log(res);
    
                document.querySelector(".logCorreo").value = "";
                document.querySelector(".logPassword").value = "";
    
                if (res) {
                    alert_normal("LOGENADO...!!","center","success",1500);
                    setTimeout(() => {
                        location.reload()
                        // location.href = "?app=principal";
                    }, 1000);
                }
    
    
            },
            './ajax/ajaxProcesar.php');

    }else {

        alert_normal("Corregir datos!!","center","error",1500);
    }



}

