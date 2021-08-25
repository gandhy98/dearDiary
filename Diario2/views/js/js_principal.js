console.log("se cargo js_principal.js");


function entrarNotas() {
    alert("se hizo click")
    const jsonData = {
        id: 'entrarNotas'
    }

    envio_ajax(
        jsonData,
        (res) => {

            console.log(res);
            if (res) {
                location.href = "?app=notas";
            }

        },
        './ajax/ajaxProcesar.php'
    );
}


function salir() {

    // empaquetando los datos
    const jsonData = {
        id: 'salir'
    }

    envio_ajax(
        jsonData,
        (res) => {

            console.log(res);
            if (res) {

                alert_normal("Gracias por la visita, hasta pronto", "center", "info", 3000)

                setTimeout(() => {
                    location.href = "?app=login";
                }, 1100);

            }

        },
        './ajax/ajaxProcesar.php'
    );
}


function bichos() {
    alert("gandhychaaa!!!");
}