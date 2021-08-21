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
    alert("se hizo click")

    // empaquetando los datos
    const jsonData = {
        id: 'salir'
    }

    envio_ajax(
        jsonData,
        (res) => {

            console.log(res);
            if (res) {
                location.href = "?app=login";
            }

        },
        './ajax/ajaxProcesar.php'
    );
}


function bichos() {
    alert("gandhychaaa!!!");
}