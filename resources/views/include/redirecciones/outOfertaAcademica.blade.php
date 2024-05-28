<script>
    $("#calculadoraHeader").on('click', function() {
        calculadoraHeader();
    });


    $("#preinscripcionHeader").on('click', function() {
        preinscripcionHeader();
    });

    $('#linkCalculaTuBeca').click(function(event) {
        console.log("click fuera de oferta");
        calculadoraHeader();
    });

    $('#linkPreinscripcionEnLinea').click(function(event) {
        console.log("click fuera de oferta");
        preinscripcionHeader();
    })

    function calculadoraHeader() {
        window.open("{{ route('calcula_tu_cuota') }}", '_blank');
    }

    function preinscripcionHeader() {
        window.open("{{ route('preinscripcion.linea') }}", '_blank');
    }
</script>
