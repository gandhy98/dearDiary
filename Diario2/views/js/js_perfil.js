console.log("se cargo js_perfil.js")


function EditarPerfil() {
    event.preventDefault();
    let Nombre = document.querySelector(".txtPerNombre").value
    let Apellido = document.querySelector(".txtPerApellido").value
        //let fecha_nacimiento = document.querySelector(".xtPerFecha ")
    let img_perfil = document.querySelector(".img_perfil").files[0]

    //console.log(txtImg);

    envioFile_ajax("POST", {
            id: 'editarPerfil',
            Nombre,
            Apellido
        }, {
            img_perfil
        },
        res => {
            console.log(res);

            if (res.eval) {
                alert(res.msj[0]);
            } else {
                alert(res.msj[0]);
            }

        },
        './ajax/ajaxProcesar.php'
    );

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