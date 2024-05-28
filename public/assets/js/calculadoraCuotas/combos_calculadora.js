$(document).ready(function () {
    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            if (value.clave == 5) {
                estatus = "selected";
            }
            else {
                estatus = "";
            }
            $('#selectPlantel').append(`<option ${estatus} value="${value.clave}">${value.descrip}</option>`);
            getPeriodos();
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });

});

$("select[name=selectPlantel]").change(function () {

    //validar si ingresa al formulario desde cero o si ya tiene datos ingresados 
    console.log($('#folioCrm').val());
    if ($('#folioCrm').val() == "" || $('#folioCrm').val() == null) {
        console.log('es elprimer calculo');

        getPeriodos();
    }
    else {
        console.log('se hizo ya un calculo se requiere un recalculo');
        let carreraResguardo = setCarreraSeleccionada();
        let nombreCarreraRes = setNombreCarrreraSaleccionada();
        console.log(carreraResguardo);
        console.log(nombreCarreraRes);

        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');
        $("#selectCarrera").empty();
        $("#selectCarrera").append(`<option><div class="spinner-border" role="status"><span class="visually-hidden">Recalculando...</span></div></option>`);

        recalculoDeCombos(carreraResguardo, nombreCarreraRes);

    }

});

$("select[name=selectPeriodo]").change(function () {

    let nombrePeriodo = $('select[name="selectPeriodo"] option:selected').text();
    $('#periodoCrm').val(`${nombrePeriodo}`);

    //es la primera peticion o se limpio el combo de carreras

    if ($('#folioCrm').val() == "" || $('#folioCrm').val() == null) {
        console.log('es elprimer calculo, verificar si no hay variables de sesion para evitar perder la infirmacion');

        $.ajax({
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: setUrlBase() + "get/variables/calculadora",
        }).done(function (data) {
            console.log(data);
            if (data.nivel_calculadora != null) {
                $("#selectNivel").empty();
                $("#selectNivel").append(`<option>Recalculado...</option>`);

                let plantel = $('select[name=selectPlantel]').val();
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: setUrlBase() + "getNiveles",
                    data: {
                        plantel: plantel
                    }
                }).done(function (info) {
                    console.log(info);
                    $.each(info, function (index, value) {
                        console.log(value.descrip);
                        console.log(data.nivel_calculadora);
                        if (value.descrip == data.nivel_calculadora) {
                            estado = "selected";
                        } else {
                            estado = "";
                        }
                        $('#selectNivel').append("<option value='" + value.clave + "' " + estado + ">" + value
                            .descrip + "</option>");
                    });

                }).fail(function () {
                    console.log("Algo salió mal");
                });
            }
            else {
                getNiveles();
            }

        }).fail(function () {
            console.log("Algo salió mal");
        });
    }
    else {
        console.log('se hizo ya un calculo');
        let carreraResguardo = setCarreraSeleccionada();
        let nombreCarreraRes = setNombreCarrreraSaleccionada();
        $('#selectCarrera').empty();
        $('#selectCarrera').append(`<option value="">Selecciona un Carrera</option>`);
        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');

        recalculoDeCombos(carreraResguardo, nombreCarreraRes);
    }

});

$("select[name=selectNivel]").change(function () {

    let nombreNivel = $('select[name="selectNivel"] option:selected').text();
    $('#nivelCrm').val(`${nombreNivel}`);

    console.log($('select[name=selectNivel]').val());

    if ($('select[name=selectNivel]').val() == 2 || $('select[name=selectNivel]').val() == 3) {
        if ($("#selectEgresado").hasClass("d-none") === true) {
            $('#selectEgresado').removeClass('d-none');
        }
    }
    else {
        if ($("#selectEgresado").hasClass("d-none") === false) {
            $('#selectEgresado').addClass('d-none');
        }
    }

    $('#selectCarrera').empty();
    $('#grupoBotones').empty();
    $('#grupoInformacion').addClass('d-none');


    getCarreras();

});

// detecta el cambio de carrera para mostrar horarios
$("select[name=selectCarrera]").change(function () {

    $('#cargador_horarios').removeClass('d-none');
    $('#grupoBotones').empty();
    $('#grupoInformacion').addClass('d-none');

    obtenerHorariosBeca();
});

