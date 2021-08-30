console.log("se cargo js_perfil.js")


/**
 * ACTUALIZACIONES
 * 
 */

//
function subirFotoPerfil() {

    let img_foto = document.querySelector(".img_foto").files[0];

    envioFile_ajax({
            id: "upload-fotoPerfil"
        }, {
            img_foto
        },
        res => {
            console.info(res)
            if (res.eval1) {
                alert_normal('Se actualizó la foto perfil!', 'center', 'success', 1500);
                //recargadno la pagina despues de 1300 millisegundos
                setTimeout(() => {
                    location.reload();
                }, 1300);
            }

        },
        "./ajax/ajaxProcesar.php"
    )

}

// Actualiza los datos del usuario
function updatePerfil_data() {

    let email = document.querySelector(".txt_email").value
    let nombre = document.querySelector(".txt_nombre").value
    let apellido = document.querySelector(".txt_apellido").value
    let fecha_nacimiento = document.querySelector(".txt_fechaNacimiento").value

    console.log("local", {
        email,
        nombre,
        apellido,
        fecha_nacimiento
    });

    envio_ajax({
            id: "updateData_perfil",
            email,
            nombre,
            apellido,
            fecha_nacimiento
        },
        res => {
            console.log(res);
            if (res.eval) {
                alert_mixin(res.msj.msj1, 'bottom-end', 'success', 1200);
            } else {
                alert_mixin("no se actualizóssss", 'bottom-end', 'error', 1200);
            }
        },
        "./ajax/ajaxProcesar.php"
    );

}





/**
 * 
 * 
 */
function EditarPerfil() {
    event.preventDefault();
    let Nombre = document.querySelector(".txtPerNombre").value
    let Apellido = document.querySelector(".txtPerApellido").value
        //let fecha_nacimiento = document.querySelector(".xtPerFecha ")
    let img_perfil = document.querySelector(".img_perfil").files[0]

    //console.log(txtImg);

    envioFile_ajax({
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
                alert_normal('No se isnerto las preguntas!', 'center', 'error', 1500);
            }

        },
        './ajax/ajaxProcesar.php'
    );

}