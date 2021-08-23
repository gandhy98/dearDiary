console.log("se cargo js_notas.js")


//alert("okok")


function insertarNotas() {
    let titulo = document.querySelector(".txt_titulo").value
    let contenido = document.querySelector(".txt_contenido").value
    let estado = document.querySelector(".check_estado").checked
    let img_nota = document.querySelector(".img_nota").files[0]


    // console.log({
    //     titulo,
    //     contenido,
    //     estado,
    //     img_nota
    // })

    estado = estado ? 1 : 2;

    /**muestra ejemplo -------------------- */
    // if(estado === true){
    //     estado = 1;
    // }else{
    //     estado = 2;
    // }
    /** fin ejemplo------------ */

    envioFile_ajax("POST", {
            id: 'insert-nota',
            titulo,
            contenido,
            estado
        }, {
            img_nota
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