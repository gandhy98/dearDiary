console.log("se cargo js_perfil.js")

function EditarPerfil() {
    event.preventDefault();
    let txtImg = document.getElementById("txtImg").files[0];
    let txtPerNombre = document.querySelector(".txtPerNombre").value;
    let txtPerApellido = document.querySelector(".txtPerApellido").value;
    let txtPerFecha = document.querySelector(".txtPerFecha").value;

    const jsonData = {
        id: 'EditarPerfil',
        txtImg,
        txtPerNombre,
        txtPerApellido,
        txtPerFecha
    }

    envio_ajax(jsonData, (res) => {

        document.getElementById("imgPreview").src = event.target.result;

    }, './ajax/ajaxProcesar.php');
}