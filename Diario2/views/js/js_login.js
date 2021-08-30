console.log("se cargo js_login.js")

function updatePass() {
    event.preventDefault();
    let txtRecPassword = document.querySelector(".txtRecPassword").value;
    let txtRecPassword2 = document.querySelector(".txtRecPassword2").value;
    console.log(txtRecPassword);


    if (txtRecPassword === txtRecPassword2) {
        const jsonData = {
            id: 'updatePass',
            txtRecPassword,
            txtRecPassword2
        }
        envio_ajax(jsonData, (res) => {
                console.log(res);

                if (res.eval) {
                    document.querySelector(".txtRecPassword").value = "";
                    document.querySelector(".txtRecPassword2").value = "";

                    alert_mixin("se actualizo su contraseña, inicie sesion", 'bottom-end', 'success', 1200);
                    setTimeout(() => {
                        location.href = "?app=login";
                    }, 1100);

                } else {
                    alert_mixin("No se actualizo su contraseña, vuelva a intentarlo", 'bottom-end', 'warning', 1200);
                }



            },
            './ajax/ajaxProcesar.php');
    } else {
        alert("el password no es el mismo")
    }
}

function cancelar() {

    // empaquetando los datos
    const jsonData = {
        id: 'salir'
    }

    envio_ajax(
        jsonData,
        (res) => {

            console.log(res);
            if (res) {
                location.href = "?app=login";
            }

        },
        './ajax/ajaxProcesar.php'
    );
}

function verificarRespuesta() {
    event.preventDefault();
    let rcpColor = document.querySelector(".rcpColor").value;
    let rcpMascota = document.querySelector(".rcpMascota").value;
    //console.log(rcpColor, rcpMascota);
    envio_ajax({
            id: 'verifyPregunta',
            rcpColor,
            rcpMascota
        }, (res) => {
            console.log(res);
            document.querySelector(".rcpColor").value = "";
            document.querySelector(".rcpMascota").value = "";

            if (res.val) {

                location.href = "?app=recuperarPass";

            } else {
                alert_mixin("no son las respuestas correctas", 'bottom-end', 'error', 1200);
            }

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
            location.href = "?app=preguntaPass";
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
    if (validarEmail(logCorreo) && logPassword.length != 0) {

        envio_ajax(jsonData, (res) => {

                console.log(res);

                if (res.eval) {

                    document.querySelector(".logCorreo").value = "";
                    document.querySelector(".logPassword").value = "";

                    alert_normal("LOGEADO...!!", "center", "success", 1500);
                    setTimeout(() => {
                        location.reload()
                            // location.href = "?app=principal";
                    }, 1000);
                } else {
                    alert_normal(res.msj, "center", "warning", 1500);
                }


            },
            './ajax/ajaxProcesar.php');

    } else {

        alert_normal("Corregir datos!!", "center", "error", 1500);
    }



}