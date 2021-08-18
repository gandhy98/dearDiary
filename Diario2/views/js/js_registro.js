console.log("se cargo js_registro.js")


function insertPregunta() {
    event.preventDefault();
    let txtPregunta1 = document.querySelector(".txtPregunta1").value;
    let txtPregunta2 = document.querySelector(".txtPregunta2").value;

    const jsonData = {
        id: 'insertPregunta',
        txtPregunta1,
        txtPregunta2
    }

    envio_ajax(jsonData, (res) => {
            /**
             * result the server
             */
            console.log(res);

            if (res.val) {
                /** 
                 * clear the form
                 */
                document.querySelector(".txtPregunta1").value = "";
                document.querySelector(".txtPregunta2").value = "";

                /**
                 * redir an other page
                 */
                location.href = "?app=login";

            } else {
                alert(res.msj);
            }

        },
        './ajax/ajaxProcesar.php');


}

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


        envio_ajax(jsonData, (res) => {
                /**
                 * result the server
                 */
                // console.log(res);

                if (res.val) {
                    /** 
                     * clear the form
                     */
                    document.querySelector(".txtNombre").value = "";
                    document.querySelector(".txtApellido").value = "";
                    document.querySelector(".txtCorreo").value = "";
                    document.querySelector(".txtPassword").value = "";
                    document.querySelector(".txtPassword2").value = "";

                    /**
                     * redir an other page
                     */
                    location.href = "?app=preguntaPass";

                } else {
                    alert(res.msj);
                }

            },
            './ajax/ajaxProcesar.php');



    } else {
        alert("el password no es el mismo")
    }

}