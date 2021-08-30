/**
 * MODULO SEGUIDOR
 * 
 */

/**
 * 
 * @param {*} iduserperfil 
 */
function obtenerEstadoSeguidor(iduserperfil) {
    // alert(iduserperfil)
    envio_ajax({
            id: "state-seguidor",
            iduserperfil
        },
        res => {
            console.log(res)

            let text_seguir = document.querySelector(".text_seguir");
            if (res.eval) {
                text_seguir.innerText = "SIGUIENDO"
            } else {
                text_seguir.innerText = "SEGUIR"
            }
        },
        "./ajax/ajaxProcesar.php"
    );
}

/**
 * 
 * @param {*} iduser 
 */
function seguirUser(iduserperfil) {

    /**
     * iduser para seguir
     */

    // let text_seguir = document.querySelector(".text_seguir");

    console.log(iduserperfil)

    envio_ajax({
            id: "seguir-perfil",
            iduserperfil
        },
        res => {
            console.log(res)
                //actualiza el elemento boton siguiendo
            obtenerEstadoSeguidor(iduserperfil)

        },
        "./ajax/ajaxProcesar.php"
    )


}



// EJECUTANDO SCRIPTS LOCALES

window.onload = () => {
    // alert("se cargo la mamada");
    let pgperfil = document.querySelector("#perfil_visit_view");
    if (pgperfil) {
        obtenerEstadoSeguidor(_iduser);
    }

}