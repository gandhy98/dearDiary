console.log("se cargo js_registro.js")




function registarse() { //funcion para recojer los datos del form

    event.preventDefault();

    let txtNombre = document.querySelector(".txtNombre").value;
    let txtApellido = document.querySelector(".txtApellido").value;
    let txtCorreo = document.querySelector(".txtCorreo").value;
    let txtPassword = document.querySelector(".txtPassword").value;
    let txtPassword2 = document.querySelector(".txtPassword2").value;



    const jsonData = {
        id: 'registro',
        txtNombre,
        txtApellido,
        txtCorreo,
        txtPassword,
        txtPassword2
    }

    //enviarlos al servidor apache para que se procese con PHP

    let formData = new FormData();

    formData.append("data", JSON.stringify(jsonData));

    fetch('./ajax/ajaxProcesar.php', {
            method: 'POST',
            body: formData
        }).then(data => data.json())
        .then(data => {
            /**
             * esperamos el resultado en esta funcion
             */
            console.log(data);

            alert(data)
            document.querySelector(".txtNombre").value = "";
            document.querySelector(".txtApellido").value = "";
            document.querySelector(".txtCorreo").value = "";
            document.querySelector(".txtPassword").value = "";
            document.querySelector(".txtPassword2").value = "";

            location.href = "?app=login";


        })

}