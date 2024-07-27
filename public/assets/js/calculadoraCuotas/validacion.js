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
            required: "Nombre obligatorio.",
        },
        apellidosProspecto: {
            required: "Apellidos obligatorios",
        },
        telefonoProspecto: {
            required: "Teléfono obligatorio",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        emailProspecto: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo."
        },
    },
    submitHandler: function (form) {

        let selectNivelComp = $('select[name=selectNivel]').val();

        if (selectNivelComp > 1) {
            if ($('input:radio[name=typeProspecto]:checked').val() == undefined) {
                Swal.fire({
                    icon: "error",
                    title: "Campo obligatorio",
                    text: "Por favor indica si eres egresado o no.",
                    showConfirmButton: true,
                });
            } else {
                if ($('input:radio[name=typeTelefono]:checked').val() == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "Campo obligatorio",
                        text: "Por favor indica de que tipo es tu teléfono",
                        showConfirmButton: true,
                    });

                } else {
                    envioFormulario(form);
                }
            }
        } else {
            if ($('input:radio[name=typeTelefono]:checked').val() == undefined) {
                Swal.fire({
                    icon: "error",
                    title: "Campo obligatorio",
                    text: "Por favor indica de que tipo es tu teléfono",
                    showConfirmButton: true,
                });

            } else {
                envioFormulario(form);
            }
        }
    }
});