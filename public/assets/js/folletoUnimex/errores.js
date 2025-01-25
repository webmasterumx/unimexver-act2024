function mensajesDeError(jqXHR, textStatus) {
    if (jqXHR.status === 0) {

        $("#alertaCombosFolletoForm").addClass("alert-primary");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `No tienes conexión a internet.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (jqXHR.status == 404) {

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (jqXHR.status == 500) {

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    }
    else if (jqXHR.status == 503) {

        $("#alertaCombosFolletoForm").addClass("alert-warning");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Sitio en mantenimiento intenta mas tarde.
            <br>
            Codigo: ${jqXHR.status}`
        );

    }
    else if (textStatus === 'parsererror') {

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (textStatus === 'timeout') {

        console.log('Time out error.');


        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (textStatus === 'abort') {

        console.log('Ajax request aborted.');


        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else {

        console.log('Uncaught Error: ' + jqXHR.responseText);

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    }
}

function mensajeDeErrorForm(params) {
    if (jqXHR.status === 0) {

        $("#iconContentModalFolleto").addClass("bi bi-exclamation-circle-fill text-primary");
        $("#contenidoModalMensajeFolleto").html(`
            No tienes conexión a internet.
        `);

    } else if (jqXHR.status == 404) {

        $("#iconContentModalFolleto").addClass("bi bi-x-circle-fill text-danger");
        $("#contenidoModalMensajeFolleto").html(`
            Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
        `);

    } else if (jqXHR.status == 500) {

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    }
    else if (jqXHR.status == 503) {

        $("#alertaCombosFolletoForm").addClass("alert-warning");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Sitio en mantenimiento intenta mas tarde.
            <br>
            Codigo: ${jqXHR.status}`
        );

    }
    else if (textStatus === 'parsererror') {

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (textStatus === 'timeout') {

        console.log('Time out error.');


        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else if (textStatus === 'abort') {

        console.log('Ajax request aborted.');


        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );

    } else {

        console.log('Uncaught Error: ' + jqXHR.responseText);

        $("#alertaCombosFolletoForm").addClass("alert-danger");
        $("#alertaCombosFolletoForm").removeClass("d-none");
        $("#textoalertaCombosFolletoFormdora").html(
            `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.
            <br>
            Codigo: ${jqXHR.status}`
        );
    }

    $("#warningMensajeFolleto").modal("show");
}