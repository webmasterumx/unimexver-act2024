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
            required: "Periodo obligatorio.",
        },
        plantelSelectFolleto: {
            required: "Plantel obligatorio.",
        },
        nombreFolleto: {
            required: "Nombre obligatorio",
        },
        correoFolleto: {
            required: "Correo obligatorio",
            email: "Ingresa un formato valido de correo."
        },
        celularFolleto: {
            required: "Teléfono obligatorio.",
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