console.log("se cargo js_salir.js");

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