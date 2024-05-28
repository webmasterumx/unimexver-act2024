$("#formPreincripcion").validate({

    rules: {
        correo: {
            required: true,
            email: true,
        },
        telefono: {
            required: true,
            minlength: 10,
            maxlength: 10,
        }
    },
    messages: {
        correo: {
            required: "Ingresa tu correo.",
            email: "Formato de correo incorrecto.",
        },
        telefono: {
            required: "Ingresa tu teléfono.",
            minlength: "El teléfono celular debe tener mínimo 8 o 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 8 o 10 digitos."
        }
    },
    submitHandler: function (form) {

        $("#validarCorreo").prop("disabled", true);
        $('#validarCorreo').html(`
        <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Validando Datos
        `);

        let formData = new FormData(form);
        let ruta = setUrlBase() + "validacion/preinscripcion";

        $.ajax({
            method: "POST",
            url: ruta,
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {
            console.log(data);

            let respuesta = JSON.parse(data);
            console.log(respuesta);

            if (respuesta.acceso == true) {
                $('#validarCorreo').html(`
                <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Redirigiendo
                `);
                let redireccion = setUrlBase() + "form/datos_gemerales/preinscripcion";

                setTimeout(`location.href='${redireccion}'`, 2000);
            } else if (respuesta.acceso == false) {
                $('#validarCorreo').html(`
                Respuesta Obtenida
                `);

                $('#statictConfirmPreinscripcion').modal('show');
            } else if (respuesta.acceso = "Descartar") {
                $("#validarCorreo").prop("disabled", false);
                $('#validarCorreo').html(`
                <i class="bi bi-box-arrow-right"></i>
                Continuar
                `);

                Swal.fire({
                    icon: "error",
                    title: "Correo ya registrado",
                });
            }


        }).fail(function () {
            console.log("Algo salió mal");
        });


    }
});

$("#formPromoPreinscripcion").validate({
    rules: {
        nombreInscripcion: {
            required: true,
        },
        apellidoPatInscripcion: {
            required: true,
        },
        apellidoMatInscripcion: {
            required: true,
        },
        diaNacimiento: {
            required: true,
        },
        mesNacimiento: {
            required: true,
        },
        yearNacimiento: {
            required: true,
        },
        telefonoInscripcion: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefonoCelInscripcion: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        calleInscripcion: {
            required: true,
        },
        numeroInscripcion: {
            required: true,
        },
        coloniaInscripcion: {
            required: true,
        },
        estadoInscripcion: {
            required: true,
        },
        municipioInscripcion: {
            required: true,
        },
        plantelSelect: {
            required: true,
        },
        periodoSelect: {
            required: true,
        },
        nivelSelect: {
            required: true,
        },
        carreraSelect: {
            required: true,
        },
        horarioSelect: {
            required: true,
        },
    },
    messages: {
        nombreInscripcion: {
            required: "Ingresa tu nombre(s).",
        },
        apellidoPatInscripcion: {
            required: "Ingresa tu apellido paterno.",
        },
        apellidoMatInscripcion: {
            required: "Ingresa tu apellido materno.",
        },
        diaNacimiento: {
            required: "Día requerido.",
        },
        mesNacimiento: {
            required: "Mes requerido.",
        },
        yearNacimiento: {
            required: "Año requerido.",
        },
        telefonoInscripcion: {
            required: "Ingresa un número de teléfono.",
            minlength: "El teléfono celular debe tener mínimo 8 o 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 8 o 10 digitos."
        },
        telefonoCelInscripcion: {
            required: "Ingresa un número de celular.",
            minlength: "El teléfono celular debe tener mínimo 8 o 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 8 o 10 digitos."
        },
        calleInscripcion: {
            required: "Calle requerida.",
        },
        numeroInscripcion: {
            required: "Número requerido.",
        },
        coloniaInscripcion: {
            required: "Colonia requerida.",
        },
        estadoInscripcion: {
            required: "Estado requerido.",
        },
        municipioInscripcion: {
            required: "Municipio requerido.",
        },
        plantelSelect: {
            required: "Plantel requerido.",
        },
        periodoSelect: {
            required: "Periodo requerido.",
        },
        nivelSelect: {
            required: "Nivel requerido.",
        },
        carreraSelect: {
            required: "Carrera requerida.",
        },
        horarioSelect: {
            required: "Horario requerido.",
        }
    },
    submitHandler: function (form) {

        $('#calcularPromo').html(`
        <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Calculando Promoción
        `);

        let formData = new FormData(form);
        let ruta = setUrlBase() + "obtener/promo/preinscripcion";

        $.ajax({
            method: "POST",
            url: ruta,
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {
            $('#calcularPromo').html(`
            <i class="bi bi-box-arrow-right"></i>
            Continuar
            `);
            console.log(data);
            estadoCampos(true);

            let respuesta = JSON.parse(data);
            console.log(respuesta);

            $('#calcularPromo').addClass("d-none");

            if (respuesta.Success == true) {
                $('#continuarProceso').removeClass('d-none');
                $('#corregirDatos').removeClass('d-none');
                $("#respuestaSuccess").removeClass('d-none');
                $('#precioPromo').html("$" + respuesta.Importe);
                $('#fechaLimitePromo').html(respuesta.FechaFinalPromocion);
                $("#respuestaError").addClass('d-none');
            }
            else {
                $("#respuestaError").removeClass('d-none');
                $('#corregirDatos').removeClass('d-none');
                $("#respuestaError").html(respuesta.MensajeDeError);
            }

        }).fail(function () {
            console.log("Algo salió mal");
        });


    }
});

