<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Día UNIMEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/diaUnimex/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
   
    <section class="container">

        <!--formulario-->
        <form id="formulario">

            @csrf
            <!--frase 1-->
            <div id="frase1" class="mx-auto">FICHA DE REGISTRO UNIMEX</div>

            <div class="row" id="contenedor">

                <div class="col-md-6 col-md">

                    <label class="form-label" for="nombre">Nombre y apellidos:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required>

                    <label class="form-label" for="celular">Teléfono celular:</label>
                    <input class="form-control" type="text" name="celular" id="celular" maxlength="10"
                        pattern="[0-9]+" required>

                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" required>

                    <label class="form-label" for="periodo">Periodo en el que deseas ingresar:</label>
                    <select class="form-select" aria-label="periodos" id="periodo" name="periodo">
                        <option value="0" selected disabled>Selecciona</option>
                    </select>
                </div>

                <div class="col-md-6 col-md">

                    <label class="form-label" for="carrera">Carrera / Programa:</label>
                    <select class="form-select" aria-label="carrera" id="carrera" name="carrera" disabled>
                        <option value="0" selected disabled>Selecciona</option>
                    </select>

                    <label class="form-label" for="horario">Horario de interés:</label>
                    <select class="form-select" aria-label="horario" id="horario" name="horario" disabled>
                        <option value="0" selected disabled>Selecciona</option>
                    </select>

                    <label class="form-label" for="escuela">Escuela de origen:</label>
                    <select class="form-select" name="escuela" id="escuela">
                        <option value="0" selected disabled>Selecciona</option>
                    </select>

                    <br>
                </div>



                <div class="d-grid gap-2 col-6 mx-auto my-3" id="div-btn">
                    <button id="guardarDiaUnimex" class="btn btn-primary" type="submit" name="guardarDiaUnimex">
                        Guardar
                    </button>
                </div>
            </div>
            <!--frase 2-->
            <div id="frase2" class="sticky-sm-top">¡Únete a la comunidad<br>Unimexitaria!</div>
        </form>
    </section>

    <footer>
        <p>UNIVERSIDAD MEXICANA</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }
    </script>
    <script src="{{ asset('assets/js/diaUnimex/combos.js') }}"></script>
    <script src="{{ asset('assets/js/diaUnimex/errores.js') }}"></script>
    <script src="{{ asset('assets/js/diaUnimex/valida.js') }}"></script>

</body>

</html>
