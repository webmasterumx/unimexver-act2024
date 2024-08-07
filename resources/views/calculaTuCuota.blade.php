@extends('layouts.layout0')

@section('content')
    <section class="container-fluid pt-2 px-5">
        <div class="row">
            <div class="col-12 col-md-8"></div>
            <div id="mensajeCorrreo" class="col-12 col-md-4">
            </div>
            <div class="col-12 col-md-3 col-lg-3 px-3" style="background-color: rgba(0, 75, 174, 30%);">
                <form id="form_calculadora" class="row p-3">
                    @csrf
                    <h6>¿Cuándo te gustaría iniciar?</h6>
                    <hr>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectPlantel" id="selectPlantel">
                        <option value="" selected disabled>Selecciona el Plantel</option>
                    </select>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectPeriodo" id="selectPeriodo">
                        <option value="" selected disabled>¿Cuándo deseas iniciar?</option>
                    </select>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectNivel" id="selectNivel">
                        <option value="" selected disabled>Selecciona el Nivel</option>
                    </select>
                    <div class="col-12 row mb-5 d-none" id="selectEgresado">
                        <div class="col-7 p-0">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeProspecto" id="egresado"
                                    value="1">
                                <label style="font-size: 12px;" class="form-check-label" for="egresado">Soy Egresado
                                    Unimex</label>
                            </div>
                        </div>
                        <div class="col-5 p-0 mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeProspecto" id="noEgresado"
                                    value="0">
                                <label style="font-size: 12px;" class="form-check-label" for="noEgresado">Otra
                                    Institución</label>
                            </div>
                        </div>
                    </div>

                    <h5>Personaliza Tu Cuota</h5>
                    <hr>
                    <div class="mb-2 p-0 col-6">
                        <input type="text" class="form-control form-control-sm" id="nombreProspecto"
                            name="nombreProspecto" placeholder="Nombre (Obligatorio)">
                    </div>
                    <div class="mb-2 p-0 col-6">
                        <input type="text" class="form-control form-control-sm" id="apellidosProspecto"
                            name="apellidosProspecto" placeholder="Apellidos (Obligatorio)">
                    </div>
                    <div class="input-group mb-2 col-12 p-0 mb-1">
                        <div class="input-group-text">
                            <i class="bi bi-telephone-fill"></i> &nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="typeTelefono" id="telefono_celular"
                                value="1">
                            <label class="form-check-label" for="telefono_celular">
                                Cel
                            </label>
                            <input class="form-check-input ms-3" type="radio" name="typeTelefono" id="telefono_fijo"
                                value="2">
                            <label class="form-check-label" for="telefono_fijo">
                                Fijo
                            </label>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="telefonoProspecto"
                            name="telefonoProspecto" placeholder="Teléfono (Obligatorio)" maxlength="10" minlength="10">
                    </div>
                    <div class="input-group mb-2 col-12 p-0 mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" class="form-control form-control-sm" placeholder="E-mail (Obligatorio)"
                            id="emailProspecto" name="emailProspecto" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-check col-12">
                        <input class="form-check-input" type="checkbox" value="" id="terminosYcondiciones"
                            name="terminosYcondiciones" checked>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link p-0 text-start" data-bs-toggle="modal"
                            data-bs-target="#avisoPrivacidadCalculadora" style="font-size: 14px;">
                            He leído y acepto el aviso de privacidad
                        </button>

                        @include('modales.avisoPrivacidadCalculadora')
                    </div>
                    <button id="envio_caluladora" class="btn btn-primary mt-3" type="submit">
                        Calcular
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-9 col-lg-9 mt-2 mt-md-0 p-0 px-md-3">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/2024/2024_1.jpg') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/2.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/3.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/4.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                </div>
                <div id="informacionCRM" class="row mt-3 d-none">
                    <h2 class="text-center mb-3" style="color: #004b93">¡Estás a un paso de ser UNIMEXITARIO!</h2>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="folioCrm" name="folioCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="nombreCrm" name="nombreCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="periodoCrm" name="periodoCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="nivelCrm" name="nivelCrm">
                    </div>
                    <div class="col-12 mt-3 no-print">
                        <p class="text-center">
                            Elige la Licenciatura de interés y después el horario que prefieres.
                        </p>
                    </div>
                    <div class="col-12 no-print">
                        <select id="selectCarrera" name="selectCarrera" class="form-select mx-auto w-75 text-center">
                            <option value="" disabled> - Selecciona una carrera - </option>
                        </select>
                    </div>
                    <div id="cargador_horarios" class="col-12 text-center d-none mt-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>
                            Obteniendo horarios disponibles...
                        </p>
                    </div>
                    <div class="col-12 row no-print" id="grupoBotones">
                    </div>
                    <div id="cargador_costos" class="col-12 text-center d-none mt-3 mb-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>
                            Obteniendo costos...
                        </p>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 row mt-3 d-none" id="grupoInformacion">
                        <div class="col-12 text-end">
                            <button id="printButton" onclick="imprimir()" type="button" class="btn mb-3">
                                <i class="bi bi-printer" style="color: #de951b;"></i>
                                Imprimir
                            </button>
                            <button onclick="enviarDetallesHorarioBeca()" id="correoButton" type="button"
                                class="btn mb-3 ms-2">
                                <i class="bi bi-envelope" style="color: #de951b;"></i>
                                Enviar a correo
                            </button>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    INSCRIPCIÓN
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p class="text-secondary">
                                            Con tu promoción
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoCnPromocion" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card h-100" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    4 PARCIALIDADES DE
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p id="porcentajeBeca" class="text-secondary">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoBeca" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    TOTAL A PAGAR EN 1er CUATRIMESTRE
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p class="text-secondary">
                                            Promoción y Beca
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoPromocion" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mt-3" style="border: 1px solid #004b93">
                                <div class="card-body">
                                    <p class="text-secondary">
                                        Tu selección ha sido: <span id="carreraInfo" style="color: #004b93;"><b>
                                                LICENCIATURA EN DISEÑO
                                                GRAFICO</b></span> <br>
                                        Plantel: <span id="plantelInfo" style="color: #004b93;"><b></b></span> en
                                        horario: <span id="turnoInfo" style="color: #004b93"><b></b></span> de
                                        <span id="horarioInfo" style="color: #004b93"><b></b></span>
                                        <br>
                                        Inicio de clases: <span id="incioInfo" style="color: #004b93"><b></b></span><br>
                                        Vigencia: <span id="vigenciaInfo" style="color: #004b93"><b></b></span><br>
                                        Durante el cuatrimestre se deberán pagar 4 parcialidades indicadas en el Calendario
                                        Escolar. <br>
                                        Para mayor información de los costos de reinscripción, acude al plantel de tu
                                        interés.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-3 no-print">
                            <button onclick="redireccionPreinscripcionEnLinea()" id="redireccionPEL" href="#"
                                class="btn" style="background-color: #de951b;">
                                PREINSCRIPCIÓN EN LINEA
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('modales.confirmacion')
@endsection

@section('scripts')
    <script>
        $.ajax({
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: setUrlBase() + "get/variables/calculadora",
        }).done(function(data) {
            console.log(data);
            if (data.nivel_calculadora != null) {
                console.log('hay variable de session para este modulo');
                $("#selectNivel").empty();
                $('#selectNivel').append("<option selected value=''>" + data.nivel_calculadora + "</option>");
            }

        }).fail(function() {
            console.log("Algo salió mal");
        });

        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }

        function imprimir() {
            $.print("#informacionCRM", {
                globalStyles: true,
                mediaPrint: true,
                stylesheet: null,
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: 'Resumen de tu selección en la Calculadora de Becas UNIMEX',
                doctype: ' <!doctype html> '
            });
        }

        $("#telefonoProspecto").bind('keypress', function(event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('#terminosYcondiciones').on('click', function() {
            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
                $('#envio_caluladora').attr('disabled', false);
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
                $('#envio_caluladora').attr('disabled', true);
            }
        });

        $('#nombreProspecto').keypress(function(tecla) {
            if ((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla
                    .charCode > 90) && (tecla.charCode != 45) && (tecla.charCode != 32) && (tecla.charCode != 241)) return false;
        });

        $('#apellidosProspecto').keypress(function(tecla) {
            if ((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla
                    .charCode > 90) && (tecla.charCode != 45) && (tecla.charCode != 32) && (tecla.charCode != 241)) return false;
        });
    </script>
    <script src="{{ asset('assets/js/calculadoraCuotas/app_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/combos_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/validacion.js') }}"></script>
@endsection
