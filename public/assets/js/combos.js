$(document).ready(function () {

    console.log('hola combos');

    // Inicializar con todos los combos del formulario - Contacto -
    // Desabilitados excepto el de Plantel
    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);

    /**
     * hay que buscar el inicializador de combos
     */

    $("#nivelSelect").empty();
    $("#nivelSelect").append(`<option value="" selected disabled>- Seleccionar nivel -</option>`);
    $('#periodoSelect').empty();
    $("#periodoSelect").append(`<option value="" selected disabled>- Seleccionar periodo - </option>`);
    $('#carreraSelect').empty();
    $("#carreraSelect").append(`<option value="" selected disabled>- Seleccionar carrera -</option>`);
    $('#horarioSelect').empty();
    $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

    /*
     * obtiene los planteles para el formulario de contacto.
     * Paginas :
     * - Inicio -
     * - Todas las pagina de Licenciatura, Licenciatura SUA y Postgrado -
     * - Pagina de Contacto 
     */
    $.ajax({
        method: "GET",
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        $.each(data, function (index, value) {

            if (value.clave == 5) {
                option = `<option selected value="${value.clave}">${value.descrip}</option>`;
            } else {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
            }
            $('#plantelSelect').append(option);

        });

        $("select[name=nivelSelect]").prop("disabled", false);
        let ruta = setUrlBase() + "getNiveles";
        let plantel = $('select[name=plantelSelect]').val();
        let info = {
            plantel: plantel
        }
        let element = '#nivelSelect';

        postAjaxPeticionContact(ruta, info, element);

    }).fail(function () {
        console.log("Algo salió mal");
    });

    // Detecta el cambio de opcion en un select para actuar en otro
    /*
     * se activa al cambiar de plantel 
     * y se muestran los niveles
     */
    $("select[name=plantelSelect]").change(function () {

        let nivel = $('select[name=nivelSelect]').val();
        let ruta = setUrlBase() + "getNiveles";
        let plantel = $('select[name=plantelSelect]').val();
        let data = {
            plantel: plantel
        }
        let element = '#nivelSelect';

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ruta,
            data: data
        }).done(function (data) {

            $("#nivelSelect").empty();
            $("#nivelSelect").append(`<option value="" selected disabled>- Seleccionar nivel -</option>`);
            $('#periodoSelect').empty();
            $("#periodoSelect").append(`<option value="" selected disabled>- Seleccionar periodo -</option>`);
            $('#carreraSelect').empty();
            $("#carreraSelect").append(`<option value="" selected disabled>- Seleccionar carrera - </option>`);
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);


            console.log(data);

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

        if (nivel != '' || nivel !== '' || nivel != null) {
            $("select[name=nivelSelect]").prop("disabled", false);
        } else {
            /* $("select[name=periodoSelect]").prop("disabled", true);
            $("select[name=carreraSelect]").prop("disabled", true);
            $("select[name=horarioSelect]").prop("disabled", true); */
        }

    });

    /**
     * se activa cuando se cambia de nivel 
     * y se muestran los periodos
     */
    $("select[name=nivelSelect]").change(function () {

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
            $("#periodoSelect").append(`<option value="" selected disabled>- Seleccionar periodo -</option>`);
            $('#carreraSelect').empty();
            $("#carreraSelect").append(`<option value="" selected disabled>- Seleccionar carrera -</option>`);
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

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

        $("select[name=periodoSelect]").prop("disabled", false);

    });

    /**
     * se activa cuando se cambia el periodo 
     * y muestra las carreras segun: plantel, nivel y periodo
     */
    $("select[name=periodoSelect]").change(function () {

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
            $("#carreraSelect").append(`<option value="" selected disabled>- Seleccionar carrera -</option>`);
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

            console.log(data);

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
            console.log(data);

            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>- Seleccionar horario -</option>`);

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

        $("select[name=horarioSelect]").prop("disabled", false);

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
}