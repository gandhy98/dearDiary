console.log("se cargo js_registro.js")



function registarse() {

    event.preventDefault();

    let txtNombre = document.querySelector(".txtNombre").value;
    let txtApellido = document.querySelector(".txtApellido").value;
    let txtCorreo = document.querySelector(".txtCorreo").value;
    let txtPassword = document.querySelector(".txtPassword").value;
    let txtPassword2 = document.querySelector(".txtPassword2").value;



    if (txtPassword === txtPassword2) {

        // Empaquetamos los datos del form
        const jsonData = {
            id: 'registro',
            txtNombre,
            txtApellido,
            txtCorreo,
            txtPassword,
            txtPassword2
        }

        if (validarEmail(txtCorreo) && txtPassword.length > 6 && txtPassword2.length > 6 && txtNombre.length != 0 && txtApellido.length != 0) {

            envio_ajax(jsonData, (res) => {

                    console.log(res);

                    document.querySelector(".txtNombre").value = "";
                    document.querySelector(".txtApellido").value = "";
                    document.querySelector(".txtCorreo").value = "";
                    document.querySelector(".txtPassword").value = "";
                    document.querySelector(".txtPassword2").value = "";

                    if (res) {
                        alert_normal("registro exitoso", "center", "success", 1500);
                        setTimeout(() => {
                            //ocation.reload()
                            location.href = "?app=login";
                        }, 1000);
                    }


                },
                './ajax/ajaxProcesar.php');

        } else {

            alert_normal("contraseña tiene que ser mayor a 6 digitos, llene corectamente", "center", "error", 1500);
        }
    } else {
        alert("la contraseña no coinciden")
    }
}