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

/**
 * AGREGAR PREGUNTAS
 */

function agrearPreguntas() {
    // console.log("agregando preguntas")

    let txtColor = document.querySelector(".txtColor").value;
    let txtMascota = document.querySelector(".txtMascota").value;

    envio_ajax({
            id: "addQuestion",
            txtColor,
            txtMascota
        }, (resultado) => {

            console.log(resultado);

            if (resultado.val) {
                Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se isnerto las preguntas!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    //location.href = "?app=perfil";

            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'No se isnerto las preguntas!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        },
        './ajax/ajaxProcesar.php'
    );

}