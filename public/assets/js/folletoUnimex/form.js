$("#form_folleto").validate({
    rules: {
        peridoSelectFolleto: {
            required: true,
        },
        plantelSelectFolleto: {
            required: true,
        },
        nombreFolleto: {
            required: true,
        },
        correoFolleto: {
            required: true,
            email: true
        },
        celularFolleto: {
            required: true,
        }
    },
    messages: {
        peridoSelectFolleto: {
            required: "Periodo requerido",
        },
        plantelSelectFolleto: {
            required: "Plantel requerido",
        },
        nombreFolleto: {
            required: "Nombre requerido",
        },
        correoFolleto: {
            required: "Correo requerido",
            email: "Formato de correo incorrecto"
        },
        celularFolleto: {
            required: "Teléfono celular requerido",
        }
    },
    submitHandler: function (form) {

        $("#redireccionPEL").prop("disabled", true);
        $('#redireccionPEL').html(`
            <div style="width: 20px !important; height: 20px !important;"
                class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            Descargando..
        `);

        let formData = new FormData(form);

        let nivel = getNivelPosicion();
        let carrera = getCarreraPosicion();

        formData.append("nivelPosicion", nivel);
        formData.append("carreraPosicion", carrera);

        $.ajax({
            method: "POST",
            url: setUrlBase() + "procesa/datos/folleto",
            data: formData,
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {
            console.log(data);

        }).fail(function () {
            console.log("Algo salió mal");
        });

    }
});