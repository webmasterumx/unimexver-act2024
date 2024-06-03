
$("#servicio_alumnos").validate({
    wrapper: "span",
    rules: {
        name_service: {
            required: true,
        },
        email_service: {
            required: true,
            email: true,
        },
        phone_casa_service: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        movil_service: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        asunto_service: {
            required: true,
        },
        matricula_service: {
            required: true,
            minlength: 11,
            maxlength: 11
        },
        mensaje_service: {
            required: true
        }
    },
    messages: {
        name_service: {
            required: "Nombre obligatorio.",
        },
        email_service: {
            required: "Correo obligatorio.",
            email: "Dirección de E-mail invalida.",
        },
        phone_casa_service: {
            required: "Teléfono obligatorio.",
            minlength: "El número de teléfono debe tener mínimo 10 digitos.",
            maxlength: "El número de teléfono debe tener máximo 10 digitos."
        },
        movil_service: {
            required: "Celular obligatorio.",
            minlength: "El número de celular debe tener mínimo 10 digitos.",
            maxlength: "El número de celular debe tener máximo 10 digitos."
        },
        asunto_service: {
            required: "Asunto obligatorio.",
        },
        matricula_service: {
            required: "Matrícula obligatoria.",
            minlength: "La matrícula debe tener mínimo 11 digitos.",
            maxlength: "La matrícula debe tener máximo 11 digitos."
        },
        mensaje_service: {
            required: "Mensaje obligatorio.",
        }
    },
    submitHandler: function (form) {
        //* cambiar estado del boton
        $('#enviarDatosServicio').prop("disabled", true);
        $('#enviarDatosServicio').html(`
            <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            &nbsp;Enviando Datos..
        `);

        //!validacion de operacion
        let operacion = Number($('#number1').val()) + Number($('#number2').val());
        let operacionUsuario = $('#operacion_service').val();
        let element = $("#deacuerdo_service");

        if (validarAvisoDePrivacidad(element) == true) {
            if (operacion == operacionUsuario) {
                let ruta = setUrlBase() + "form/servicio/alumno";
                let formData = new FormData(form);

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

                    Swal.fire({
                        title: "¡REGISTRO EXITOSO!",
                        text: "Datos enviados correctamente",
                        icon: "success"
                    });

                    resetForms(1);

                    $('#enviarDatosServicio').prop("disabled", false);
                    $('#enviarDatosServicio').html(`
                        ENVIAR DATOS
                    `);

                }).fail(function (e) {
                    console.log("Request: " + JSON.stringify(e));
                });

            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Resultado de la operación es incorrecto!",
                    icon: "error"
                });

                $('#enviarDatosServicio').prop("disabled", false);
                $('#enviarDatosServicio').html(`
                    ENVIAR DATOS
                `);
            }
        } else {
            Swal.fire({
                icon: "error",
                text: "Debe aceptar el aviso de privacidad para poder continuar.",
            });

            $('#enviarDatosServicio').prop("disabled", false);
            $('#enviarDatosServicio').html(`
                ENVIAR DATOS
            `);
        }
    }
});

$("#form_contacto").validate({
    rules: {
        nombre_prospecto: {
            required: true,
        },
        apellidos_prospecto: {
            required: true,
        },
        mail_prospecto: {
            required: true,
        },
        celular_prospecto: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefono_prospecto: {
            required: true,
            minlength: 10,
            maxlength: 10
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
        }
    },
    messages: {
        nombre_prospecto: {
            required: "Nombre obligatorio.",
        },
        apellidos_prospecto: {
            required: "Apellidos obligatorios.",
        },
        mail_prospecto: {
            required: "Correo obligatorio.",
            email: "Dirección de E-mail invalida."
        },
        celular_prospecto: {
            required: "Teléfono celular obligatorio.",
            minlength: "El número de celular debe tener mínimo 10 digitos.",
            maxlength: "El número de celular debe tener máximo 10 digitos."
        },
        telefono_prospecto: {
            required: "Teléfono de casa obligatorio.",
            minlength: "El número de teléfono debe tener mínimo 10 digitos.",
            maxlength: "El número de teléfono debe tener máximo 10 digitos."
        },
        plantelSelect: {
            required: "Selecciona un plantel.",
        },
        periodoSelect: {
            required: "Por favor, dinos cuando quieres empezar.",
        },
        nivelSelect: {
            required: "Selecciona un nivel",
        },
        carreraSelect: {
            required: "Selecciona una carrera",
        },
        horarioSelect: {
            required: "Selecciona un horario",
        }
    },
    submitHandler: function (form) {

        $('#envio_contacto').prop("disabled", true);
        $('#envio_contacto').html(`
            <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            &nbsp;Enviando Datos..
        `);


        form.submit();
    }
});

$("#form_trabaja").validate({
    wrapper: "span",
    rules: {
        nombre_trabajo: {
            required: true,
        },
        email_trabaja: {
            required: true,
            email: true,
        },
        telefono_casa_trabaja: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefono_movil_trabaja: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        plantel_trabaja: {
            required: true,
        },
        nivel_est_trabaja: {
            required: true,
        },
        cv_trabaja: {
            required: true,
        },
        puesto_interes: {
            required: true,
        },
        experiencia_trabaja: {
            required: true,
        },
    },
    messages: {
        nombre_trabajo: {
            required: "Nombre obligatorio.",
        },
        email_trabaja: {
            required: "Correo obligatorio.",
            email: "Dirección de E-mail invalida."
        },
        telefono_casa_trabaja: {
            required: "Teléfono de casa obligatorio.",
            minlength: "El teléfono debe tener mínimo 10 digitos.",
            maxlength: "El teléfono debe tener máximo 10 digitos."
        },
        telefono_movil_trabaja: {
            required: "Teléfono celular obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        plantel_trabaja: {
            required: "Seleccione un plantel para continuar.",
        },
        nivel_est_trabaja: {
            required: "Seleccione un nivel escolar para continuar.",
        },
        cv_trabaja: {
            required: "CV obligatorio.",
        },
        puesto_interes: {
            required: "Puesto de interés obligatorio.",
        },
        experiencia_trabaja: {
            required: "Experiencia laboral obligatoria.",
        },
    },
    submitHandler: function (form) {

        //* cambiar estado del boton
        $('#enviarDatosTrabaja').prop("disabled", true);
        $('#enviarDatosTrabaja').html(`
            <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            &nbsp;Enviando Datos..
        `);


        //!validacion de operacion
        let operacion = Number($('#number3').val()) + Number($('#number4').val());
        let operacionUsuario = $('#operacion_trabaja').val();
        let element = $("#aceptar_trabajar");

        if (validarAvisoDePrivacidad(element) == true) {
            if (operacion == operacionUsuario) {
                let ruta = setUrlBase() + "form/trabaja/unimex";
                let formData = new FormData(form);

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

                    Swal.fire({
                        title: "¡REGISTRO EXITOSO!",
                        text: "Datos enviados correctamente",
                        icon: "success"
                    });

                    resetForms(2);

                    $('#enviarDatosTrabaja').prop("disabled", false);
                    $('#enviarDatosTrabaja').html(`
                        ENVIAR DATOS
                    `);

                }).fail(function (e) {
                    console.log("Request: " + JSON.stringify(e));
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Resultado de la operación es incorrecto!",
                    icon: "error"
                });

                $('#enviarDatosTrabaja').prop("disabled", false);
                $('#enviarDatosTrabaja').html(`
                    ENVIAR DATOS
                `);
            }
        } else {
            Swal.fire({
                icon: "error",
                text: "Debe aceptar el aviso de privacidad para poder continuar.",
            });

            $('#enviarDatosTrabaja').prop("disabled", false);
            $('#enviarDatosTrabaja').html(`
                ENVIAR DATOS
            `);
        }
    }
});

$("#form_quejaSugerencia").validate({
    wrapper: "span",
    rules: {
        nombre_qys: {
            required: true,
        },
        mail_qys: {
            required: true,
            email: true,
        },
        telefono_casa_qys: {
            required: true,
        },
        telefono_movil_qys: {
            required: true,
        },
        matricula_qys: {
            required: true,
            minlength: 11,
            maxlength: 11
        },
        asunto_qys: {
            required: true,
        },
        mensaje_qys: {
            required: true,
        }
    },
    messages: {
        nombre_qys: {
            required: "Nombre obligatorio.",
        },
        mail_qys: {
            required: "Correo obligatorio.",
            email: "Dirección de E-mail invalida."
        },
        telefono_casa_qys: {
            required: "El teléfono es obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        telefono_movil_qys: {
            required: "El teléfono celular es obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        matricula_qys: {
            required: "Su matrícula es obligatoria.",
            minlength: "Su matrícula debe tener mínimo 11 digitos.",
            maxlength: "Su matrícula debe tener máximo 11 digitos."
        },
        asunto_qys: {
            required: "Asunto obligatorio.",
        },
        mensaje_qys: {
            required: "Mensaje obligatorio.",
        }
    },
    submitHandler: function (form) {
        //* cambiar estado del boton
        $('#enviarDatosAceptar').prop("disabled", true);
        $('#enviarDatosAceptar').html(`
             <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                 <span class="visually-hidden">Loading...</span>
             </div>
             &nbsp;Enviando Datos..
         `);

        //!validacion de operacion
        let operacion = Number($('#number5').val()) + Number($('#number6').val());
        let operacionUsuario = $('#operacion_qys').val();
        let element = $("#aceptar_qys");

        if (validarAvisoDePrivacidad(element) == true) {
            if (operacion == operacionUsuario) {
                let ruta = setUrlBase() + "form/quejas/sugerencias";
                let formData = new FormData(form);

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

                    Swal.fire({
                        title: "¡REGISTRO EXITOSO!",
                        text: "Datos enviados correctamente",
                        icon: "success"
                    });

                    resetForms(3);

                    $('#enviarDatosAceptar').prop("disabled", false);
                    $('#enviarDatosAceptar').html(`
                        ENVIAR DATOS
                    `);

                }).fail(function (e) {
                    console.log("Request: " + JSON.stringify(e));
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Resultado de la operación es incorrecto!",
                    icon: "error"
                });

                $('#enviarDatosAceptar').prop("disabled", false);
                $('#enviarDatosAceptar').html(`
                    ENVIAR DATOS
                `);
            }

        } else {
            Swal.fire({
                text: "Debe aceptar el aviso de privacidad para poder continuar.",
                icon: "error"
            });

            $('#enviarDatosAceptar').prop("disabled", false);
            $('#enviarDatosAceptar').html(`
                ENVIAR DATOS
            `);
        }
    }
});

$("#form_empresasOCC").validate({
    wrapper: "span",
    rules: {
        nombre_empresaOCC: {
            required: true,
        },
        contacto_empresaOCC: {
            required: true,
        },
        email_empresaOCC: {
            required: true,
            email: true,
        },
        telefono_empresaOCC: {
            required: true,
        },
        celular_empresaOCC: {
            required: true,
        },
        razon_empresaOCC: {
            required: true
        },
        rfc_empresaOCC: {
            required: true,
        },
        comentarios_empresaOCC: {
            required: true,
        }
    },
    messages: {
        nombre_empresaOCC: {
            required: "Nombre de su empresa es obligatoria.",
        },
        contacto_empresaOCC: {
            required: "Nombre de su contacto es obligatorio.",
        },
        email_empresaOCC: {
            required: "Correo obligatorio.",
            email: "Dirección de E-mail invalida."
        },
        telefono_empresaOCC: {
            required: "Teléfono requerido.",
            minlength: "El teléfono debe tener mínimo 8 o 10 digitos.",
            maxlength: "El teléfono debe tener máximo 8 o 10 digitos."
        },
        celular_empresaOCC: {
            required: "Teléfono celular requerido.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        razon_empresaOCC: {
            required: "Razón social obligatoria."
        },
        rfc_empresaOCC: {
            required: "RFC obligatorio.",
        },
        comentarios_empresaOCC: {
            required: "Comentarios obligatorios.",
        }
    },
    submitHandler: function (form) {
        //* cambiar estado del boton
        $('#enviarDatosEmpresasOCC').prop("disabled", true);
        $('#enviarDatosEmpresasOCC').html(`
             <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                 <span class="visually-hidden">Loading...</span>
             </div>
             &nbsp;Enviando Datos..
         `);

        //!validacion de operacion
        let operacion = Number($('#number7').val()) + Number($('#number8').val());
        let operacionUsuario = $('#operacion_empresaOCC').val();
        let element = $("#aceptar_empresasocc");

        if (validarAvisoDePrivacidad(element) == true) {
            if (operacion == operacionUsuario) {
                let ruta = setUrlBase() + "form/empresas/occ";
                let formData = new FormData(form);

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

                    Swal.fire({
                        title: "¡REGISTRO EXITOSO!",
                        text: "Datos enviados correctamente",
                        icon: "success"
                    });

                    resetForms(4);

                    $('#enviarDatosEmpresasOCC').prop("disabled", false);
                    $('#enviarDatosEmpresasOCC').html(`
                        ENVIAR DATOS
                    `);

                }).fail(function (e) {
                    console.log("Request: " + JSON.stringify(e));
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Resultado de la operación es incorrecto!",
                    icon: "error"
                });

                $('#enviarDatosEmpresasOCC').prop("disabled", false);
                $('#enviarDatosEmpresasOCC').html(`
                    ENVIAR DATOS
                `);
            }
        } else {

            Swal.fire({
                icon: "error",
                text: "Debe aceptar el aviso de privacidad para poder continuar.",
            });

            $('#enviarDatosEmpresasOCC').prop("disabled", false);
            $('#enviarDatosEmpresasOCC').html(`
                ENVIAR DATOS
            `);
        }


    }
});

function validarAvisoDePrivacidad(element) {
    if ($(element).is(':checked')) {
        // el check de aviso de privacidad esta seleccionado
        return true;
    }
    else {
        // el check de aviso de privacidad no esta seleccionado
        return false;
    }
}