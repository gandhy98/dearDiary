console.log("se cargo js_salir.js");

function salir() {
    alert("se hizo click")

    //empaquetamos los datos

    const jsonData = {
        id: 'salir'
    }
    envio_axaj(jsonData, (res) => {
            console.log(res);
            if (res) {
                location.href = '?app = login';
            }
        },
        './ajax/ajaxProcesar.php')
}

function prueba() {
    alert("probando gandhy");
}