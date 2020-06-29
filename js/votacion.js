function verificar_votante() {
    var boton = "verificar";
    var valor = true;
    var dni = $('#dni').val();

    valor = validar_campo_vacio('dni', dni, valor);
    if (valor){
        var cadena = "dni=" + dni;
        $.ajax({
            type:"POST",
            url: urlweb + "api/Votacion/verificar_votante",
            data: cadena,
            dataType: 'json',
            beforeSend: function () {
                $("#" + boton).html("Cargando...");
                $("#" + boton).attr("disabled", true);
            },
            success:function (r) {
                switch (r.result.code) {
                    case 1:
                        $("#" + boton).attr("disabled", false);
                        $("#" + boton).html("DNI Correcto");
                        location.href = urlweb + 'votacion/votar/' + dni;
                        break;
                    default:
                        $("#" + boton).attr("disabled", false);
                        $("#" + boton).html("Verificar");
                        alert('Votante Ya Emitió Voto o No Existe');
                        break;
                }
            }
        });
    }
}

function votar(dni) {
    var boton = "votar";
    var valor = true;
    var voto = $('#voto').val();

    valor = validar_campo_vacio('voto', voto, valor);
    if (valor){
        var cadena = "voto=" + voto + "&dni=" + dni;
        $.ajax({
            type:"POST",
            url: urlweb + "api/Votacion/registrar_voto",
            data: cadena,
            dataType: 'json',
            beforeSend: function () {
                $("#" + boton).html("Cargando...");
                $("#" + boton).attr("disabled", true);
            },
            success:function (r) {
                switch (r.result.code) {
                    case 1:
                        alert('Voto Registrado')
                        location.href = urlweb + 'resultados/';
                        break;
                    default:
                        $("#" + boton).attr("disabled", false);
                        $("#" + boton).html("Votar");
                        alert('Ocurrió Un Error Al Registrar Voto. Localice al Tilin que hizo esto.');
                        break;
                }
            }
        });
    }
}