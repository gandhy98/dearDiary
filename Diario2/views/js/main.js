console.log("se cargo main.js")


/**
 * 
 * @param {*} valor 
 * @returns 
 */
 function validarEmail(valor) {

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (emailRegex.test(valor)){
        return true;
    } else {
        return false;
    }
}



/**
 * 
 * @param {*} title 
 * @param {*} position 
 * @param {*} icon 
 * @param {*} timer 
 */
function alert_normal(title, position, icon, timer) {
    Swal.fire({
        position,
        icon,
        title,
        showConfirmButton: false,
        timer
    })
}


/**
 * 
 * @param {*} title 
 * @param {*} position 
 * @param {*} icon 
 * @param {*} timer 
 */
function alert_mixin(title,position,icon,timer) {
    const Toast = Swal.mixin({
        toast: true,
        position,
        showConfirmButton: false,
        timer,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon,
        title
      })
}




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
function envioFile_ajax( jsonData, jsonFile, fnRquest, url){
    let formData = new FormData();

    for(nameIN in jsonFile){   
        formData.append(nameIN, jsonFile[nameIN]);
    }    
    
    formData.append("datas", JSON.stringify(jsonData));

    fetch(url,{
        method: "POST",
        body: formData
    }).then( data => data.json())
    .then(data => {
        fnRquest(data);
    })
}
