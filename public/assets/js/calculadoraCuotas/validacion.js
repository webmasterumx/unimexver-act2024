$("#form_calculadora").validate({
    // wrapper: "span",
    rules: {
        selectPlantel: {
            required: true,
        },
        selectPeriodo: {
            required: true,
        },
        selectNivel: {
            required: true,
        },
        nombreProspecto: {
            required: true,
        },
        apellidosProspecto: {
            required: true,
        },
        telefonoProspecto: {
            required: true,
        },
        emailProspecto: {
            required: true,
            email: true,
        },
    },
    messages: {
        selectPlantel: {
            required: "Selecciona un plantel",
        },
        selectPeriodo: {
            required: "Selecciona un periodo",
        },
        selectNivel: {
            required: "Selecciona un nivel",
        },
        nombreProspecto: {
            required: "Ingresa tu nombre",
        },
        apellidosProspecto: {
            required: "Ingresa tus apellidos",
        },
        telefonoProspecto: {
            required: "Ingresa tu telefono",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        emailProspecto: {
            required: "Ingresa tu correo",
            email: "Formato de correo incorrecto",
        },
    },
    submitHandler: function (form) {

        if ($('input:radio[name=typeTelefono]:checked').val() == undefined) {
            Swal.fire({
                icon: "error",
                title: "Campo obligatorio",
                text: "Por favor indica de que tipo es tu telefono",
                showConfirmButton: true,
            });

        } else {
            $("#envio_caluladora").prop("disabled", true);
            $('#envio_caluladora').html(`
                <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Calculando
            `);


            let formData = new FormData(form);
            let ruta = setUrlBase() + "insertar/prospecto/calculadora";

            $.ajax({
                method: "POST",
                url: ruta,
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
            }).done(function (data) {
                let respuesta = JSON.parse(data);
                console.log(respuesta);

                let nombreProspecto = $('#nombreProspecto').val() + " " + $('#apellidosProspecto').val();
                let periodoProspecto = $('select[name="selectPeriodo"] option:selected').text();
                let nivelProspecto = $('select[name="selectNivel"] option:selected').text();

                $('#folioCrm').val('Folio: ' + respuesta.FolioCRM);
                $('#nombreCrm').val(nombreProspecto);
                $('#periodoCrm').val(periodoProspecto);
                $('#nivelCrm').val(nivelProspecto);

                $.ajax({
                    method: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: setUrlBase() + "get/variables/calculadora",
                }).done(function (data) {
                    console.log(data);
                    if (data.carrera_calculadora != null) {
                        getCarrerasWithVariableEstablecida(data.carrera_calculadora);
                    }
                    else {
                        getCarreras();
                    }

                }).fail(function () {
                    console.log("Algo salió mal");
                });

                $('#envio_caluladora').html(`Calcular`);

                $('#carouselExampleIndicators').addClass('d-none');
                $('#informacionCRM').removeClass('d-none');



            }).fail(function () {
                console.log("Algo salió mal");
            });
        }


    }
});