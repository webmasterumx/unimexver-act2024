$(document).ready(function () {

    // Inicializar con todos los combos del formulario - Contacto -
    // Desabilitados excepto el de Plantel
    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);

    /*
     * obtiene los planteles para el formulario de contacto.
     * Paginas :
     * - Inicio -
     * - Todas las pagina de Licenciatura, Licenciatura SUA y Postgrado -
     * - Pagina de Contacto -
     */
    $.ajax({
        method: "GET",
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        $.each(data, function (index, value) {
            $("#plantelSelect").empty();
            if (value.clave == 5) {
                estatus = "selected";
            }
            else {
                estatus = "";
            }
            let option = `<option ${estatus} value="${value.clave}">${value.descrip}</option>`;
            $('#plantelSelect').append(option);
        });

        llenarComboPeriodosSinSeleccion();

    }).fail(function () {
        console.log("Algo salió mal");
    });

});

// Detecta el cambio de opcion en un select para actuar en otro
/*
 * se activa al cambiar de plantel 
 * y se muestran los niveles
 */
$("select[name=plantelSelect]").change(function () {

    setVariablesPrecargadas();

    let plantel = $('select[name=plantelSelect]').val();
    let ruta = setUrlBase() + "getPeriodos";
    let data = {
        plantel: plantel
    };
    let element = '#periodoSelect';

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        $('#periodoSelect').empty();
        $("#periodoSelect").append(`<option value="" selected disabled>Seleccionar periodo </option>`);
        $('#horarioSelect').empty();
        $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

        console.log(data);

        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            }
            else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }
        }


    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=periodoSelect]").prop("disabled", false);

    /* 
 */

});

/**
 * se activa cuando se cambia el periodo 
 * y muestra las carreras segun: plantel, nivel y periodo
 */
$("select[name=periodoSelect]").change(function () {


    let nivel = $('select[name=nivelSelect]').val();
    let ruta = setUrlBase() + "getNiveles";
    let plantel = $('select[name=plantelSelect]').val();
    let data = {
        plantel: plantel
    }
    let element = '#nivelSelect';

    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "get/variables/preinscripcion",
    }).done(function (info) {

        if (info.carrera_preinscripcion != null) {
            recalculoDeComboNivel(ruta, data, element, info)
        }
        else {

            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: ruta,
                data: data
            }).done(function (data) {

                $('#nivelSelect').empty();
                $("#nivelSelect").append(`<option value="" selected disabled>Seleccionar nivel</option>`);
                $('#carreraSelect').empty();
                $("#carreraSelect").append(`<option value="" selected disabled>Seleccionar carrera</option>`);
                $('#horarioSelect').empty();
                $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

                console.log(data);

                if (data.error == undefined || data.error == null) {
                    if (data.clave == undefined || data.clave == null) {
                        $.each(data, function (index, value) {
                            let option = `<option value="${value.clave}">${value.descrip}</option>`;
                            $(element).append(option);
                        });
                    }
                    else {
                        let option = `<option value="${data.clave}">${data.descrip}</option>`;
                        $(element).append(option);
                    }
                }


            }).fail(function () {
                console.log("Algo salió mal");
            });
        }

        $("select[name=nivelSelect]").prop("disabled", false);


    }).fail(function () {
        console.log("Algo salió mal");
    });

    // if (nivel != '' || nivel !== '' || nivel != null) {
    //     $("select[name=nivelSelect]").prop("disabled", false);
    // } else {
    //     $("select[name=periodoSelect]").prop("disabled", true);
    //     $("select[name=carreraSelect]").prop("disabled", true);
    //     $("select[name=horarioSelect]").prop("disabled", true);
    // }

});

/**
 * se activa cuando se cambia de nivel 
 * y se muestran los periodos
 */
$("select[name=nivelSelect]").change(function () {

    let plantel = $('select[name=plantelSelect]').val();
    let nivel = $('select[name=nivelSelect]').val();
    let periodo = $('select[name=periodoSelect]').val();

    let ruta = setUrlBase() + "getCarreras";
    let data = {
        plantel: plantel,
        nivel: nivel,
        periodo: periodo
    };
    let element = '#carreraSelect';

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        $('#carreraSelect').empty();
        $("#carreraSelect").append(`<option value="" selected disabled>Seleccionar carrera</option>`);
        $('#horarioSelect').empty();
        $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

        console.log(data);

        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            }
            else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }
        }


    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=carreraSelect]").prop("disabled", false);


});

/**
 * se activa cuando se cambia la carrera seccionada
 * y se muestran los horarios disponibles
 */
$("select[name=carreraSelect]").change(function () {

    let plantel = $('select[name=plantelSelect]').val();
    let nivel = $('select[name=nivelSelect]').val();
    let periodo = $('select[name=periodoSelect]').val();
    let carrera = $('select[name=carreraSelect]').val();

    let ruta = setUrlBase() + "getHorarios";
    let data = {
        plantel: plantel,
        nivel: nivel,
        periodo: periodo,
        carrera: carrera
    };
    let element = '#horarioSelect';

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {

        $('#horarioSelect').empty();
        $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

        console.log(data);

        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            }
            else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }
        }


    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=horarioSelect]").prop("disabled", false);

});


$("select[name=estadoInscripcion]").change(function () {
    let estado = $('select[name=estadoInscripcion]').val();

    let ruta = setUrlBase() + "getMunicipios/" + estado;

    $.ajax({
        method: "GET",
        url: ruta,
        dataType: "json",
    }).done(function (data) {
        console.log(data);
        $('#municipioInscripcion').empty();
        let option_default = `<option value="">Seleciona Delegacion</option>`;
        $("#municipioInscripcion").append(option_default);

        if (data.clave == undefined || data.clave == null) {
            for (let index = 0; index < data.length; index++) { //recorrer el array de campañas
                const element = data[index]; // se establece un elemento por campaña optenida
                let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                $("#municipioInscripcion").append(option); // se inserta la campaña de cada elemen  to
            }
        } else {
            console.log('solo hay una opcion');
            let option = `<option selected value="${data.clave}">${data.descrip}</option>`; //se establece la opcion por campaña
            $("#municipioInscripcion").append(option); // se inserta la campaña de cada elemen  to
        }



    }).fail(function () {
        console.log("Algo salió mal");
    });


});


function llenarComboPeriodosSinSeleccion() {
    setVariablesPrecargadas();
    $('#periodoSelect').empty();
    $("#periodoSelect").append(`<option value="" selected disabled>Seleccionar periodo</option>`);
    $('#horarioSelect').empty();
    $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);
    let plantel = $('select[name=plantelSelect]').val();
    let ruta = setUrlBase() + "getPeriodos";
    let info = {
        plantel: plantel
    };
    let element = '#periodoSelect';


    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: info
    }).done(function (result) {
        console.log(result);
        $("#periodoSelect").empty();
        if (result.clave == undefined || result.clave == null) {
            $.each(result, function (index, value) {
                let option = `<option value="${value.clave}">${value.descrip}</option>`;
                $(element).append(option);
            });
        }
        else {
            let option = `<option selected value="${result.clave}">${result.descrip}</option>`;
            $(element).append(option);

            console.log('solo un periodo ');

            programarRecalculoDeNivel();
        }


    }).fail(function () {
        console.log("Algo salió mal");
    });


    $("select[name=periodoSelect]").prop("disabled", false);
}

function programarRecalculoDeNivel() {
    let ruta = setUrlBase() + "getNiveles";
    let plantel = $('select[name=plantelSelect]').val();
    let data = {
        plantel: plantel
    }
    let element = '#nivelSelect';

    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "get/variables/preinscripcion",
    }).done(function (info) {
        console.log(info);
        $("select[name=nivelSelect]").prop("disabled", false);
        if (info.carrera_preinscripcion != null) {
            recalculoDeComboNivel(ruta, data, element, info)
        }
        else {

            postAjaxPeticionContact(ruta, data, element);

            $('#modalCarga').modal('hide');
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });
}