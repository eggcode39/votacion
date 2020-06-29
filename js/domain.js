var urlweb = "http://localhost/votacion/";
//var urlweb = "https://www.guabba.com/saneamiento/";
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//Llamar así: onkeyup="return validar_numeros(this.id)"
function validar_numeros(id) {
    var text = document.getElementById(id).value;
    var expreg = new RegExp(/^[0-9]*$/);
    if(expreg.test(text)){
        return true;
    } else {
        //var long = text.length;
        //var text_to_extract = long - 1;
        //document.getElementById(id).value = text.substring(0, text_to_extract);
        var re = /[a-zA-ZñáéíóúÁÉÍÓÚ´.*+?^$&!¡¿#%/{}()='|[\]\\"]/g;
        document.getElementById(id).value = text.replace(re, '');
        return false;
    }
}

function validar_campo_vacio(campo, valor, estado) {
    //var variable = "#" + campo;
    var objeto = document.getElementById(campo);
    if(valor == ""){
        //alertify.error('El siguiente Campo no puede estar vacío.');
        //$(variable).css('border','solid red');
        alert('Campo Vacio');
        objeto.style.border = 'solid red';
        estado = false;
        console.log('Campo vacio: ' + campo);
    } else {
        //$(variable).css('border','');
        objeto.style.border = '';
    }
    return estado;
}
