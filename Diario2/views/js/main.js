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
        .then(data => data.json())
        .then(res => {
            fun(res);
        });
}




/**
 * 
 * @param {*} meth 
 * @param {*} jsonData 
 * @param {*} jsonFile 
 * @param {*} fnRquest 
 * @param {*} url 
 */
function envioFile_ajax(meth, jsonData, jsonFile, fnRquest, url){
    let formData = new FormData();

    for(nameIN in jsonFile){   
        formData.append(nameIN, jsonFile[nameIN]);
    }    
    
    formData.append("datas", JSON.stringify(jsonData));

    fetch(url,{
        method: meth,
        body: formData
    }).then( data => data.json())
    .then(data => {
        fnRquest(data);
    })
}
