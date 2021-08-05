console.log("se cargo js_login.js")

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

            // location.href = "?app=principal";
        },
        './ajax/ajaxProcesar.php');


}