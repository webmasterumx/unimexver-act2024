
$(document).ready(function () {
    let plantel = 2
    let ruta = setUrlBase() + "getPeriodos";
    let data = {
        plantel: plantel
    };
    let element = '#peridoSelectFolleto';

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);
        if (data.clave == undefined || data.clave == null) {
            $.each(data, function (index, value) {
                let option = `<option value="${value.clave}">${value.descrip}</option>`;
                $(element).append(option);
            });
        } else {
            let option = `<option value="${data.clave}">${data.descrip}</option>`;
            $(element).append(option);
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=peridoSelectFolleto]").prop("disabled", false);
});

/**
 * se activa cuando se cambia el periodo 
 * y muestra las carreras segun: plantel, nivel y periodo
 */
$("select[name=peridoSelectFolleto]").change(function () {

    $('#plantelSelectFolleto').empty();
    $("#plantelSelectFolleto").append(`<option value="" selected disabled>Selecciona el plantel</option>`);


    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            $('#plantelSelectFolleto').append("<option value='" + value.clave + "'>" + value
                .descrip + "</option>");
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });

});

function postAjaxPeticionContact(ruta, data, element) {
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            let option = `<option value="${value.clave}">${value.descrip}</option>`;
            $(element).append(option);
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });
}