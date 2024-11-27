$("#formulario").validate({
    rules: {
        nombre: {
            required: true,
        },
        celular: {
            required: true,
        },
        email: {
            required: true,
        },
        periodo: {
            required: true,
        },
        carrera: {
            required: true,
        },
        horario: {
            required: true,
        },
        escuela: {
            required: true,
        }
    },
    messages: {
        nombre: {
            required: "Nombre obligatorio",
        },
        celular: {
            required: "Calular obligatorio",
        },
        email: {
            required: "Correo obligatorio",
        },
        periodo: {
            required: "",
        },
        carrera: {
            required: "",
        },
        horario: {
            required: "",
        },
        escuela: {
            required: "",
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

                if (respuesta.ruta == " " || respuesta.ruta == "") {
                    Swal.fire({
                        icon: "error",
                        title: "¡Lo sentimos!",
                        text: "Folleto no disponible",
                    });
                } else {
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