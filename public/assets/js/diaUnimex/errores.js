function erroresAlEnviarFormulario(jqXHR, textStatus) {
    if (jqXHR.status === 0) {
        Swal.fire({
            icon: "question",
            html: `No tienes conexión a internet.`,
        });
    } else if (jqXHR.status == 404) {
        Swal.fire({
            icon: "error",
            html: `Ups! <br> Ocurrio un error en el servidor! <br> Intenta enviar de nuevo tu información.`,
        });
    } else if (jqXHR.status == 500) {
        Swal.fire({
            icon: "error",
            html: `Ups! <br> Ocurrio un error en el servidor! <br> Intenta enviar de nuevo tu información.`,
        });
    } else if (jqXHR.status == 503) {
        Swal.fire({
            icon: "warning",
            html: `Sitio en mantenimiento.`,
        });
    } else if (textStatus === 'parsererror') {
        Swal.fire({
            icon: "error",
            html: `Ups! <br> Ocurrio un error en el servidor! <br> Intenta enviar de nuevo tu información.`,
        });
    } else if (textStatus === 'timeout') {
        Swal.fire({
            icon: "error",
            html: `Ups! <br> Ocurrio un error en el servidor! <br> Intenta enviar de nuevo tu información.`,
        });
    } else if (textStatus === 'abort') {
        Swal.fire({
            icon: "error",
            html: `Ups! <br> Ocurrio un error en el servidor! <br> Intenta enviar de nuevo tu información.`,
        });
    } else {
    }

    $("#guardarDiaUnimex").prop("disabled", false);
    $('#guardarDiaUnimex').html(`
        Guardar
    `);
}