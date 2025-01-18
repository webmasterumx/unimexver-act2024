/**
* 
*  Combos Carreras
*  Este documento inicializa los combos de configuración situados en el formulario de contacto
*  dentro de oferta académica.
*  =================>  Sitio Veracruz  <====================
*  Para este sitio los combos de planteles, niveles y carreras deben estar inicializados
*  Se considera una funcion especial seleccionar por defecto un ciclo solo SI LA LISTA DE ESTOS
*  CONTIENE UN ITEM.
*
*  Para esto se tienen 2 variables de poscicion ya declaradas por parte de la pagina 
*  nivelPosicionado ====> se refiere al nivel donde se esta poscisionado 
*  carreraPosicionado ==> se refiere al nombre de la carrera
*  
*  Nombre de los combos
*  plantelSelect, periodoSelect, nivelSelect, carreraSelect, horarioSelect.
*
*/

$(document).ready(function () {

    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);

    $("#periodoSelect").append(`<option value="" selected disabled>- Seleccionar periodo -</option>`);
    $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

    getPlantelesContacto();

});

$("select[name=plantelSelect]").change(function () {
    getNivelesContacto();
});

$("select[name=nivelSelect]").change(function () {
    getPeriodosContacto();
});

$("select[name=periodoSelect]").change(function () {
    getCarrerasContacto();
});

$("select[name=carreraSelect]").change(function () {
    getHorariosContacto();
});

function getPlantelesContacto() {

    $.ajax({
        method: "GET",
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {

        console.log(data);
        $.each(data, function (index, value) {
            if (value.clave == 5) {
                option = `<option selected value="${value.clave}">${value.descrip}</option>`;
            }
            else {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
            }

            $('#plantelSelect').append(option);

        });

        getNivelesContacto();

        $("select[name=nivelSelect]").prop("disabled", false);

    }).fail(function (jqXHR, textStatus, errorThrown) {

        mensajesErrorCombos(jqXHR, textStatus);

    });

}

function getNivelesContacto() {
    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);
    $("#nivelSelect").empty();
    $("#nivelSelect").append(`<option value="" selected disabled>Recalculando..</option>`);


    let nivelInicalSelect = getNivelPosicion();

    let plantel = $('select[name=plantelSelect]').val();
    console.log(plantel);
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getNiveles",
        data: {
            plantel: plantel
        }
    }).done(function (data) {
        $("select[name=nivelSelect]").prop("disabled", false);
        $("#nivelSelect").empty();
        $("#nivelSelect").append(`<option value="" selected disabled>- Seleccionar nivel -</option>`);

        console.log(data);
        $.each(data, function (index, value) {

            console.log(nivelInicalSelect);
            console.log(value);
            if (nivelInicalSelect == value.clave) {
                option = `<option selected value="${value.clave}">${value.descrip}</option>`;
            } else {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
            }

            $('#nivelSelect').append(option);

        });

        getPeriodosContacto();

    }).fail(function (jqXHR, textStatus, errorThrown) {

        mensajesErrorCombos(jqXHR, textStatus);

    });
}

function getPeriodosContacto() {
    $("select[name=periodoSelect]").prop("disabled", false);
    $("#periodoSelect").empty();
    $("#periodoSelect").append(`<option value="" selected disabled>Recalculando..</option>`);

    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);


    let plantel = $('select[name=plantelSelect]').val();
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPeriodos",
        data: {
            plantel: plantel
        }
    }).done(function (data) {

        $("#periodoSelect").empty();
        $("#periodoSelect").append(`<option value="" selected disabled>- Seleccionar periodo -</option>`);

        console.log(data);

        if (data.clave == undefined || data.clave == null) {
            $.each(data, function (index, value) {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
                $('#periodoSelect').append(option);
            });


        } else {
            option = `<option selected value="${data.clave}">${data.descrip}</option>`;
            $('#periodoSelect').append(option);

            getCarrerasContacto();
        }



    }).fail(function (jqXHR, textStatus, errorThrown) {

        mensajesErrorCombos(jqXHR, textStatus);

    });
}

function getCarrerasContacto() {

    $("select[name=carreraSelect]").prop("disabled", false);
    $("#carreraSelect").empty();
    $("#carreraSelect").append(`<option value="" selected disabled>Recalculando..</option>`);

    $("select[name=horarioSelect]").prop("disabled", true);



    let clavePlantel = $('select[name=plantelSelect]').val();
    let clavePeriodo = $('select[name=periodoSelect]').val();
    let claveNivel = $('select[name=nivelSelect]').val();
    let carreraInicialSelect = getCarreraPosicion();

    let data = {
        "plantel": clavePlantel,
        "nivel": claveNivel,
        "periodo": clavePeriodo
    }
    console.log(data);

    let ruta = setUrlBase() + "getCarreras";

    $.ajax({
        method: "POST",
        url: ruta,
        dataType: "json",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (data) {

        $("#carreraSelect").empty();
        $("#carreraSelect").append(`<option value="" selected disabled>- Seleccionar carrera -</option>`);

        console.log(data.error);

        if (data.error == undefined || data.error == null) {

            console.log('no hay error');

            $.each(data, function (index, value) {

                //console.log(carreraInicialSelect);
                //console.log(value);

                var continuaRecalculo = true;

                if (carreraInicialSelect == value.descrip) {

                    option = `<option selected value="${value.clave}">${value.descrip}</option>`;
                } else {
                    option = `<option value="${value.clave}">${value.descrip}</option>`;
                    continuaRecalculo = false;
                }

                $('#carreraSelect').append(option);


                if (continuaRecalculo == true) {

                    getHorariosContacto();
                }
                else {
                    $("#horarioSelect").empty();
                    $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);
                }
            });


        } else {

            console.log('hay error');

        }


    }).fail(function (jqXHR, textStatus, errorThrown) {

        mensajesErrorCombos(jqXHR, textStatus);

    });
}

function getHorariosContacto() {
    $("select[name=horarioSelect]").prop("disabled", false);

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

    $.ajax({
        method: "POST",
        url: ruta,
        dataType: "json",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (data) {

        $("#horarioSelect").empty();
        $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

        console.log(data);
        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $('#horarioSelect').append(option);
                });
            }
            else {
                option = `<option value="${data.clave}">${data.descrip}</option>`;
                $('#horarioSelect').append(option);
            }
        } else {

        }


    }).fail(function (jqXHR, textStatus, errorThrown) {

        mensajesErrorCombos(jqXHR, textStatus);

    });
}

function mensajesErrorCombos(jqXHR, textStatus) {
    let mensaje = "";
    let typeAlert = "";

    if (jqXHR.status === 0) {

        mensaje = `No tienes conexión a internet.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "warning";

    } else if (jqXHR.status == 404) {

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    } else if (jqXHR.status == 500) {

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    }
    else if (jqXHR.status == 503) {

        mensaje = `Sitio en mantenimiento intenta mas tarde.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "info";

    }
    else if (textStatus === 'parsererror') {

        console.log('Requested JSON parse failed.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    } else if (textStatus === 'timeout') {

        console.log('Time out error.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    } else if (textStatus === 'abort') {

        console.log('Ajax request aborted.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    } else {

        console.log('Uncaught Error: ' + jqXHR.responseText);

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        <br>
        Codigo: ${jqXHR.status}`;
        typeAlert = "danger";

    }

    let alerta = `
        <div class="alert alert-${typeAlert} alert-dismissible fade show mt-2" role="alert">
            ${mensaje}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    `;

    $("#alertasErrorCombos").append(alerta);
    $("#contenedorAlerta").removeClass("d-none");
} 