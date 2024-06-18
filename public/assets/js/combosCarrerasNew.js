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

    //$("select[name=nivelSelect]").prop("disabled", true);
    //$("select[name=periodoSelect]").prop("disabled", true);
    //$("select[name=carreraSelect]").prop("disabled", true);
    //$("select[name=horarioSelect]").prop("disabled", true);

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

    }).fail(function (error) {

        console.log("Algo salió mal");
        console.log(error);

    });

}

function getNivelesContacto() {

    $("#nivelSelect").empty();
    $("#nivelSelect").append(`<option>Selecciona el nivel</option>`);

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

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function getPeriodosContacto() {
    $("#periodoSelect").empty();
    $("#periodoSelect").append(`<option>¿Cuándo deseas iniciar?</option>`);

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

        console.log(data);

        if (data.clave == undefined || data.clave == null) {
            $.each(data, function (index, value) {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
                $('#periodoSelect').append(option);
            });
        } else {
            option = `<option selected value="${data.clave}">${data.descrip}</option>`;
            $('#periodoSelect').append(option);
        }

        getCarrerasContacto();

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function getCarrerasContacto() {

    $("#carreraSelect").empty();
    $("#carreraSelect").append(`<option>Selecciona una carrera</option>`);

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

        console.log(data);
        $.each(data, function (index, value) {

            //console.log(carreraInicialSelect);
            //console.log(value);

            if (carreraInicialSelect == value.descrip) {
                option = `<option selected value="${value.clave}">${value.descrip}</option>`;
            } else {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
            }

            $('#carreraSelect').append(option);
        });

        getHorariosContacto();

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function getHorariosContacto() {
    $("#horarioSelect").empty();
    $("#horarioSelect").append(`<option>Selecciona un horario</option>`);

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

        console.log(data);
        $.each(data, function (index, value) {
            option = `<option value="${value.clave}">${value.descrip}</option>`;
            $('#horarioSelect').append(option);
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });
}