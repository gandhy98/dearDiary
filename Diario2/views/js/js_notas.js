console.log("se cargo js_notas.js")



/**
 * MODULO COMENTARIOS DE NOTAS
 */

function agregarComentarioNota() {
    /**
     * comentario
     * idNota seleccionada
     * idPersona ( con SESSION)
     */

    let txt_comentario = document.querySelector(".txt_comentario").value;
    let txt_idnota = document.querySelector(".txt_idnota").value;

    // console.log( {
    //     txt_comentario,
    //     txt_idnota  
    // })
    // return null;

    envio_ajax({
            id:"insertar-comentario",
            txt_comentario,
            txt_idnota
        },
        res => {
            console.log(res)
            // funcion obtener comentarios 
            if(res.eval){
                alert_normal("Tu comentario se guardo!","center","success",1500);
                imprimirComentarios(txt_idnota);

                document.querySelector(".txt_comentario").value = "";

            }
        },
        "./ajax/ajaxProcesar.php"
    );

}


function imprimirComentarios(idnota) {
    /**
     * id de la nota
     *
     */

    // console.log(idnota);

    let txt_idnota = document.querySelector(".txt_idnota");

    txt_idnota.value = idnota;


    envio_ajax({
            id:"obtener-comentarios",
            idnota
        },
        res => {
            console.info(res);

            /**
             * AGREGAR COMENTARIOS  (FALTAA)
             */

            if(res.eval){

                let comentarios = res.data;

                let comentario_html = '';

                comentarios.forEach(element => {
                    // console.log(element);
                    comentario_html +=  `
                        <span href="?app=perfil_visit&cod=${element.idusuario}" class="list-group-item list-group-item-action my-1" >
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                ${element.nombre} ${element.apellido}
                            </h5>
                            <small>
                                <img src="./public/img_perfil/${element.url_foto}" width="50px" class="border-radius rounded " alt="">
                            </small>
                            </div>
                            <p class="mb-1">    
                                ${element.contenido}
                            </p>
                            <small>
                                <img src="./views/public/icons/gracias.png" 
                                    width="25px"
                                    alt=""
                                >
                                <img src="./views/public/icons/like.png" 
                                    width="25px"
                                    alt=""
                                >

                                <a href="?app=perfil_visit&cod=${element.idusuario}" class="mx-3">
                                    ver perfil
                                </a>
                                

                            </small>
                        </span>
                    `;

                });

                let contenedor_comentarios = document.querySelector(".contenedor_comentarios");

                contenedor_comentarios.innerHTML = comentario_html;

                // console.log(comentario_html);

            }else{
                let contenedor_comentarios = document.querySelector(".contenedor_comentarios");
                contenedor_comentarios.innerHTML = `
                      <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Gandhy te dice...</h5>
                        <small>
                            <img src="./public/img_perfil/test.jpg" width="50px" class="border-radius rounded " alt="">
                        </small>
                        </div>
                        <p class="mb-1">Se el primero en comentar la nota</p>
                        <small>
                            <img src="./views/public/icons/gracias.png" 
                                width="25px"
                                alt=""
                            >
                            <img src="./views/public/icons/like.png" 
                                width="25px"
                                alt=""
                            >
                        </small>
                    </a>
                `;


            }


        },
        "./ajax/ajaxProcesar.php"
    );
}







/**
 *
 */
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

    envioFile_ajax({
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
                alert_normal(res.msj[0], "center", 'success', 1200)
                setTimeout(() => {
                    location.reload();
                }, 1100);

            } else {
                alert_normal(res.msj[0], "center", 'warning', 1200)
            }

        },
        './ajax/ajaxProcesar.php'
    );

}