<script>
   
    function calculadoraHeader() {
        let nivel = nivelPosicionado;
        let carrera = carreraPosicionado;
        let carreraFinal = carrera.replace(/ /g, "_");

        $.ajax({
            method: "GET",
            url: setUrlBase() + "set/variables/calculadora/" + nivel + "/" + carreraFinal,
        }).done(function(data) {
            console.log(data);

        }).fail(function() {
            console.log("Algo salió mal");
        });
        window.open("{{ route('calcula_tu_cuota') }}", '_blank');
    }

    function preinscripcionHeader() {
        let nivel = nivelPosicionado;
        let carrera = carreraPosicionado;
        let carreraFinal = carrera.replace(/ /g, "_");

        $.ajax({
            method: "GET",
            url: setUrlBase() + "set/variables/preinscripcion/" + nivel + "/" + carreraFinal,
        }).done(function(data) {
            console.log(data);

        }).fail(function() {
            console.log("Algo salió mal");
        });
        window.open("{{ route('preinscripcion.linea') }}", '_blank');
    }
</script>
