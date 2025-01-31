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

        let nombreFolleto = $('#nombre').val().replace(/ /g, "");

        if (nombreFolleto == "") {
            Swal.fire({
                icon: "error",
                text: "El campo de nombre no puede estar vacío",
            });
        } else {

            $("#guardarDiaUnimex").prop("disabled", true);
            $('#guardarDiaUnimex').html(`
                <div style="width: 20px !important; height: 20px !important;"
                    class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Guardando Datos
            `);
            
            let formData = new FormData(form);

            $.ajax({
                method: "POST",
                url: setUrlBase() + "diaUnimex/enviar/datos",
                data: formData,
                dataType: "html",
                cache: false,
                contentType: false,
                processData: false,
            }).done(function (data) {
                console.log(data);
                let respuesta = JSON.parse(data);
                console.log(respuesta);

                if (respuesta.estado == true) {
                    Swal.fire({
                        html: `
                            <p class="text-center">
                            <img style="width: 175px;" src="https://unimexver.edu.mx/img/header/logo-2020.webp" alt=""> 
                            </p>
                            <hr style="border-color: #0e488a; border: 2px dashed;">
                            <h1 class="text-center" style="color: #0e488a; font-family: 'Lobster', 'cursive';">
                            Bienvenido! <br> UNIMEX te esta esperando.
                            </h1>
                            <hr style="border-color: #0e488a; border: 2px dashed;">
                            <p class="m-0 text-center fw-bold text-dark">Folio: <span style="color: #0e488a;">${respuesta.FolioCRM}</span></p>
                            <p class="m-0 text-center fw-bold text-dark">Nombre: <span style="color: #0e488a;">${respuesta.Nombre}</span></p>
                            <p class="m-0 text-center fw-bold text-dark">Correo: <span style="color: #0e488a;">${respuesta.Email}</span></p>
                            <hr style="border-color: #0e488a; border: 2px dashed;">
                            <p class="text-center" style="color: #de951b; font-size: 26px;"><b><i class="bi bi-camera-fill"></i> Captura tu pase de acceso</b></p>
                        `,
                        confirmButtonText: "OK",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location.reload();
                        } else if (result.isDenied) {

                        }
                    });
                }
                else {
                    Swal.fire({
                        icon: "error",
                        text: respuesta.mensaje,
                    });
                }


            }).fail(function (jqXHR, textStatus, errorThrown) {
                erroresAlEnviarFormulario(jqXHR, textStatus);
            });

        }


    }
});