console.log("se cargo js_login.js")

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

function ingresar_login() {
    event.preventDefault();

    let logCorreo = document.querySelector(".logCorreo").value;
    let logPassword = document.querySelector(".logPassword").value;

    const jsonData = {
        id: 'login',
        logCorreo,
        logPassword,
    }

    envio_ajax(jsonData, (res) => {

            console.log(res);

            document.querySelector(".logCorreo").value = "";
            document.querySelector(".logPassword").value = "";

            if (res) {
                location.href = "?app=principal";
            }


        },
        './ajax/ajaxProcesar.php');


}