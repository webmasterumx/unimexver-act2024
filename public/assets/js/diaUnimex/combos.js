$(document).ready(function () {

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPeriodos",
        data: {
            plantel: 5
        },
    }).done(function (data) {

        console.log(data);
        if (data.clave == undefined || data.clave == null) {
            $.each(data, function (index, value) {
                let option = `<option value="${value.clave}">${value.descrip}</option>`;
                $("#periodo").append(option);
            });
        } else {
            let option = `<option value="${data.clave}">${data.descrip}</option>`;
            $("#periodo").append(option);
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });

    $.ajax({
        method: "GET",
        url: setUrlBase() + "get/escuelas/diaUnimex",
        type: "json"
    }).done(function (data) {

        console.log(data);
        if (data.clave_escuela_origen == undefined || data.clave_escuela_origen == null) {
            $.each(data, function (index, value) {
                let option = `<option value="${value.clave_escuela_origen}">${value.nombre_escuela_origen}</option>`;
                $("#escuela").append(option);
            });
        } else {
            let option = `<option value="${data.clave_escuela_origen}">${data.nombre_escuela_origen}</option>`;
            $("#escuela").append(option);
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });

});


$("select[name=periodo]").change(function () {


    let ruta = setUrlBase() + "get/carreras/diaUnimex/5/1";
    let element = '#carrera';

    $.ajax({
        method: "GET",
        url: ruta,
    }).done(function (data) {
        console.log(data);


        $('#carrera').empty();
        $("#carrera").append(`<option value="0" selected disabled>Selecciona</option>`);

        if (data.error == undefined || data.error == null) {

            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            } else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }

        }

    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=carrera]").prop("disabled", false);
});

$("select[name=carrera]").change(function () {

    let carrera = $('select[name=carrera]').val();
    let ruta = setUrlBase() + "get/horarios/diaUnimex/" + carrera;
    let element = '#horario';

    $.ajax({
        method: "GET",
        url: ruta,
    }).done(function (data) {
        console.log(data);

        $('#horario').empty();
        $("#horario").append(`<option value="0" selected disabled>Selecciona</option>`);

        if (data.error == undefined || data.error == null) {

            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            } else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }

        }

    }).fail(function () {
        console.log("Algo salió mal");
    });

    $("select[name=horario]").prop("disabled", false);
});