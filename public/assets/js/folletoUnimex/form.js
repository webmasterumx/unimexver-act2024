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
            maxlength: 60,
        },
        correoFolleto: {
            required: true,
            email: true,
            maxlength: 50
        },
        celularFolleto: {
            required: true,
            minlength: 10,
            maxlength: 10
        }
    },
    messages: {
        peridoSelectFolleto: {
            required: "",
        },
        plantelSelectFolleto: {
            required: "",
        },
        nombreFolleto: {
            required: "Nombre obligatorio",
            maxlength: "El número de caracteres máximo es 60."
        },
        correoFolleto: {
            required: "Correo obligatorio",
            email: "Ingresa un formato valido de correo.",
            maxlength: "El número de caracteres máximo es 50."
        },
        celularFolleto: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        }
    },
    submitHandler: function (form) {

        let nombreFolleto = $('#nombreFolleto').val().replace(/ /g, "");

        if (nombreFolleto == "") {
            Swal.fire({
                icon: "error",
                text: "El campo de nombre no puede estar vacío",
            });
        } else {
            $("#descargaFolleto").prop("disabled", true);
            $('#descargaFolleto').html(`
                  <div style="width: 20px !important; height: 20px !important;"
                      class="spinner-border" role="status">
                      <span class="visually-hidden">Loading...</span>
                  </div>
                  Cargando Archivo
              `);

            let formData = new FormData(form);
            let nivel = getNivelPosicion();
            let carrera = getCarreraPosicion();
            let nivelPagina = getNivelPagina();
            var plantelSelectFolleto = $('select[name=plantelSelectFolleto]').val();
            console.log(plantelSelectFolleto);

            switch (nivelPagina) {
                case 1: //licenciatura
                    if (plantelSelectFolleto > 2) {
                        turnoPosicionado = 1;
                    } else {
                        turnoPosicionado = 5;
                    }
                    break;
                case 2: //! licenciatura sua
                    matriz = ["", "", "53", "48", "58", "1"];
                    turnoPosicionado = matriz[plantelSelectFolleto];

                    break;
                case 3: //? posgrado
                    matriz = ["", "", "31", "20", "30", "27"];
                    turnoPosicionado = matriz[plantelSelectFolleto];

                    break;
                default:
                    break;
            }

            console.log(turnoPosicionado);

            formData.append("nivelPosicion", nivel);
            formData.append("carreraPosicion", carrera);
            formData.append("turnoPosicionado", turnoPosicionado);

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
                let respuesta = JSON.parse(data);
                console.log(respuesta);
                
                if (respuesta.estado == false) { // no se encontro la oferta academica en la configuracion
                    $("#iconContentModalFolleto").addClass("bi bi-exclamation-circle text-warning");
                    $("#contenidoModalMensajeFolleto").html(`
                        Actualmente, la carrera no está disponible en el plantel seleccionado.
                    `);
                    $("#warningMensajeFolleto").modal("show");
                }
                else if (respuesta.url == "" || respuesta.url == " ") {
                    $("#iconContentModalFolleto").addClass("bi bi-x-circle-fill text-danger");
                    $("#contenidoModalWarningMensajeFo").html(`
                        Lo sentimos, pero por el momento el folleto no está disponible. <br> Agradecemos tu comprensión.
                    `);
                    $("#warningMensajeFolleto").modal("show");
                }
                else {
                    window.open(respuesta.ruta, '_blank');
                }

                $("#descargaFolleto").prop("disabled", false);
                $('#descargaFolleto').html(`
                       ¡DESCARGAR!
                   `);

            }).fail(function (error) {
                console.log(error);
                console.log("Algo salió mal");
            });

        }


    }
});