console.log("se cargo js_registro.js")




function registarse() { //funcion para recojer los datos del form

    event.preventDefault();

    let txtNombre = document.querySelector(".txtNombre").value;
    let txtApellido = document.querySelector(".txtApellido").value;
    let txtCorreo = document.querySelector(".txtCorreo").value;
    let txtPassword = document.querySelector(".txtPassword").value;
    let txtPassword2 = document.querySelector(".txtPassword2").value;


    console.log({
        txtNombre,
        txtApellido,
        txtCorreo,
        txtPassword,
        txtPassword2
    });


    jsonData = {
        nombre: txtNombre,
        numero: 20
    }

    //enviarlos al servidor apache para que se procese con PHP

    let formData = new FormData();

    formData.append("data", JSON.stringify(jsonData));

    fetch('./ajax/ajaxProcesar.php', {
            method: 'POST',
            body: formData
        }).then(data => data.json())
        .then(data => {

            console.log(data);

            alert(data)

        })

}