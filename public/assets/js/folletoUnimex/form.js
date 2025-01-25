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
        console.log(form);

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
            console.log(carrera);

            switch (nivelPagina) {
                case 1: //licenciatura
                    if (plantelSelectFolleto > 2) {
                        turnoPosicionado = 1;
                    } else {
                        turnoPosicionado = 5;
                    }


                    indentificadorEs = 0;
                    break;
                case 2: //! licenciatura online
                    matriz = ["", "", "54", "49", "59", "50"];
                    turnoPosicionado = matriz[plantelSelectFolleto];

                    indentificadorEs = 1;
                    break;
                case 3: //? posgrado
                    matriz = ["", "", "31", "20", "30", "27"];
                    turnoPosicionado = matriz[plantelSelectFolleto];

                    indentificadorEs = 0;
                    break;
                case 4: //? posgrado en linea
                    matriz = ["", "", "55", "50", "60", "51"];
                    turnoPosicionado = matriz[plantelSelectFolleto];

                    indentificadorEs = 1;
                    break;
                default:
                    break;
            }

            console.log(indentificadorEs);

            formData.append("nivelPosicion", nivel);
            formData.append("carreraPosicion", carrera);
            formData.append("turnoPosicionado", turnoPosicionado);
            formData.append("identificadorEsp", indentificadorEs);

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

                if (data == false) { // no se encontro la oferta academica en la configuracion


                    $("#iconContentModalFolleto").addClass("bi bi-x-circle-fill text-danger");
                    $("#contenidoModalMensajeFolleto").html(`
                        Lo sentimos, pero por el momento el folleto no está disponible. <br> Agradecemos tu comprensión.
                    `);
                    $("#warningMensajeFolleto").modal("show");
                }
                else if (data == "" || data == " ") {
                    $("#iconContentModalFolleto").addClass("bi bi-exclamation-circle text-warning");
                    $("#contenidoModalMensajeFolleto").html(`
                        Actualmente, la carrera no está disponible en el plantel seleccionado.
                    `);
                    $("#warningMensajeFolleto").modal("show");
                }
                else {
                    window.open(data, '_blank');
                }

                $("#descargaFolleto").prop("disabled", false);
                $('#descargaFolleto').html(`
                     ¡DESCARGAR!
                 `);



            }).fail(function (error) {

            });
        } 

    }
});