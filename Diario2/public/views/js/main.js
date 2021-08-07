console.log("se cargo main.js")


/**
 * Función Fetch Api
 * 
 * @param {*} jsonData 
 * @param {*} fun 
 * @param {*} url 
 */
 function envio_ajax(jsonData, fun, url) {

    let formData = new FormData();
    formData.append("datas", JSON.stringify(jsonData));
    
    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then( data => data.json() )
    .then( res => {
            fun(res);
        } 
    );
}