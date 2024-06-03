@extends('layouts.layout0')

@section('content')
    <section class="container-fluid pt-2 px-5">
        <div class="row">
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
                        <input type="text" class="form-control form-control-sm" aria-label="Text input with radio button"
                            id="telefonoProspecto" name="telefonoProspecto" placeholder="Teléfono (Obligatorio)"
                            maxlength="10" minlength="10">
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
                            data-bs-target="#exampleModal" style="font-size: 14px;">
                            He leído y acepto el aviso de privacidad
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso de Privacidad</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-justify">
                                            Con fundamento en los Artículos 15 y 16 de la Ley Federal de Protección de Datos
                                            Personales en Posesión de los Particulares (la “Ley”), así como a lo establecido
                                            los Artículos 13, 14, 23, 25, y 26 de la norma reglamentaria de dicho
                                            Ordenamiento (el “Reglamento”), hacemos de su conocimiento que “Universidad
                                            Mexicana”, con domicilio (en todo lo relacionado con el presente Aviso) el
                                            ubicado en Emilio Castelar # 63, Colonia Polanco IV Sección, C.P. 11560,
                                            Alcaldía Miguel Hidalgo, Ciudad de México es responsable de recabar sus Datos
                                            Personales, del uso que se le dé a los mismos y de la protección de los mismos.
                                            <br><br>
                                            Su Información personal será utilizada para darle a conocer la Información
                                            Comercial de “Universidad Mexicana” (y/o de cualquiera de sus filiales) es
                                            decir, para fines Mercadotécnicos, y Publicitarios, como lo establece el
                                            Artículo 30 del Reglamento, entre la que se destaca la Información que hubiere
                                            solicitado, podrá utilizar la Información para fines de Publicidad o Promociones
                                            al USUARIO, referentes a Servicios Administrados por “Universidad Mexicana” (y/o
                                            de cualquiera de sus filiales) a través de Medios Electrónicos (SMS, RCS y Mail)
                                            o mediante Correo Postal o Mensajería, así como la relacionada con Promociones,
                                            invitación a Eventos, solicitudes de evaluación de la calidad en los Servicios,
                                            realizar estudios internos sobre hábitos de consumo, y cualquier otro
                                            Promocional o cuestión relacionada con los Servicios que forman parte de los
                                            conceptos comerciales conocidos, y/o comercializados por “Universidad Mexicana”,
                                            y/o por sus filiales.
                                            <br><br>
                                            Para las finalidades antes mencionadas, requerimos obtener los siguientes “Datos
                                            Personales”:
                                            <br>
                                        <ul>
                                            <li>Nombre Completo (tal y como viene en la Identificación Oficial);</li>
                                            <li>Teléfono Fijo;</li>
                                            <li>Teléfono Celular;</li>
                                            <li>Correo Electrónico;</li>
                                            <li>Estado y Municipio de residencia;</li>
                                            <li>Fecha de Nacimiento,</li>
                                            <li>Elección Educativa,</li>
                                            <li>ID (Nombre de Usuario) de Facebook, Twitter y/o Linkedin.</li>
                                        </ul>
                                        Para todos nuestros destinatarios que en fechas anteriores a la Notificación o
                                        Publicación del presente Aviso de Privacidad, nos hayan proporcionado sus Datos
                                        Personales, ya sea mediante el llenado de los Formularios para la obtención de
                                        Servicios, o por cualquier otra forma o medio, les será dado a conocer el Aviso de
                                        Privacidad conforme a los Medios Electrónicos que hubieren proporcionado, con el fin
                                        de que nos otorguen o nieguen su consentimiento (expreso o tácito) para que
                                        “Universidad Mexicana”, y/o cualquiera de sus filiales pueda(n) o no continuar
                                        llevando a cabo el tratamiento de sus Datos Personales con base en las finalidades
                                        del tratamiento establecidas en el presente Aviso de Privacidad.
                                        <br><br>
                                        Por otra parte, conforme a lo establecido en los Artículos 36 de la Ley, y 70 del
                                        Reglamento, hacemos de su conocimiento que sus Datos Personales podrán ser
                                        transferidos a Sociedades integrantes de diversos grupos comerciales distintos a
                                        Universidad Mexicana, nacionales o extranjeras, con el objetivo de cumplir las
                                        finalidades para las cuales ha proporcionado sus Datos Personales, sin embargo
                                        dichos terceros asumirán las mismas obligaciones que correspondan a Universidad
                                        Mexicana respecto del buen manejo de los Datos Personales, en éste sentido su
                                        Información podrá ser compartida con las empresas que en su momento le sea
                                        notificado por los medios de contacto que nos ha proporcionado o mediante el Aviso
                                        de Privacidad que se publique por los Medios Electrónicos de Universidad Mexicana;
                                        No obstante, Usted podrá hacer del conocimiento de “Universidad Mexicana” (y/o a
                                        través de sus filiales) si acepta o no la transferencia de sus Datos Personales,
                                        mediante notificación expresa en los medios establecidos en el presente Aviso de
                                        Privacidad, quedando de manifiesto que en caso de no hacer ninguna notificación a
                                        Universidad Mexicana dentro de los siguientes 5 días hábiles a que recibió el
                                        presente Aviso de Privacidad, se tendrá por aceptado de manera tacita su aceptación
                                        para la transmisión de sus Datos Personales a cualquier Tercero, para los fines
                                        establecidos.
                                        <br><br>
                                        Con base en lo establecido en el Artículo 35 de la Ley, el contenido de este Aviso
                                        de Privacidad, así como cualquier modificación o adición al mismo le serán dadas a
                                        conocer por medio de la dirección de Correo Electrónico que haya Usted proporcionado
                                        y en caso que no manifieste oposición al contenido y alcances de los mismos dentro
                                        de un periodo de 2 meses, contados a partir de la fecha en la que se le informe
                                        sobre el Aviso de Privacidad o sus modificaciones, se entenderá que otorga tu
                                        consentimiento tácito para que Universidad Mexicana y/o cualquiera de sus filiales
                                        efectúe el tratamiento de sus Datos Personales con base en las finalidades del
                                        tratamiento establecidas en el Aviso de Privacidad.
                                        <br><br>
                                        Con el fin de garantizar la protección de tus Datos Personales y limitar el uso o
                                        divulgación no autorizada de los mismos, Universidad Mexicana continuamente realiza
                                        y realizará las siguientes acciones:
                                        <br>
                                        <ol type="a">
                                            <li>
                                                <b>Confidencialidad de la Información.</b> -Universidad Mexicana guardará
                                                confidencialidad respecto de sus Datos Personales recabados, misma que
                                                subsistirá aun después de finalizar sus relaciones contractuales con el
                                                destinatario o Titular de dichos Datos Personales.
                                            </li>
                                            <li>
                                                <b>Notificación de Confidencialidad.</b> -En caso que, por algún motivo,
                                                Universidad Mexicana y/o cualquiera de sus filiales se vea(n) en la
                                                necesidad de proporcionar sus Datos Personales a Terceros (en los términos
                                                previstos en la Ley o en el presente Aviso de Privacidad), notificará a
                                                dichos Terceros la obligación de cumplir con las disposiciones de la Ley y
                                                la confidencialidad de tus Datos Personales.
                                            </li>
                                            <li>
                                                <b>Administración de Bases de Datos.</b> -Los Datos Personales son
                                                administrados y resguardados mediante el
                                                uso de bases de datos (“Base de Datos”), las cuales son administradas
                                                únicamente por las personas designadas por Universidad Mexicana (y/o
                                                cualquiera de sus filiales) para tal efecto, sin que se permita su uso,
                                                consulta, manejo o acceso a personas no autorizadas.
                                            </li>
                                            <li>
                                                <b>Sistemas de Cómputo e Informáticos.</b> -Nuestras Bases de Datos están
                                                protegidas por “firewalls” y sistemas de cómputo y/o informáticos enfocados
                                                a prevenir y evitar el que personas ajenas a Universidad Mexicana o no
                                                autorizadas puedan acceder a tus Datos Personales. En caso que desee limitar
                                                el uso o divulgación de sus Datos Personales, en relación con una o varias
                                                de las finalidades del tratamiento de datos personales (como caso, por
                                                ejemplo, Correos Publicitarios, Ofertas, entre otros), para ello, es
                                                necesario que dirija la solicitud en los términos que marca la Ley en su
                                                Art. 29 al Departamento de Protección de Datos Personales, responsable de la
                                                custodia de los datos personales, ubicado en Emilio Castelar # 63, Colonia
                                                Polanco IV Sección, C.P. 11560, Alcaldía Miguel Hidalgo, Ciudad de México, o
                                                bien, se nos informe Vía Correo Electrónico a privacidad@unimex.edu.mx, para
                                                garantizar su correcta recepción, con los siguientes datos y documentos:
                                            </li>
                                        </ol>
                                        <br><br>
                                        <ol>
                                            <li>
                                                Nombre completo, correo electrónico y teléfono del Titular de los Datos
                                                Personales, u otro medio para comunicarle la respuesta a su solicitud.
                                            </li>
                                            <li>
                                                Documentos que acrediten la identidad del Titular de los Datos Personales.
                                            </li>
                                            <li>
                                                Descripción clara y precisa de los Datos Personales respecto de los que se
                                                busca ejercer alguno de los derechos antes mencionados.
                                            </li>
                                            <li>
                                                Cualquier otro elemento o documento que facilite la localización de los
                                                Datos Personales; e) Indicar de las modificaciones a realizarse y/o las
                                                limitaciones al uso de los Datos Personales.
                                            </li>
                                            <li>
                                                Aportar la documentación que sustente su petición.
                                            </li>
                                        </ol>
                                        Importante: Cualquier modificación a este Aviso de Privacidad podrá consultarlo en
                                        <br><br>
                                        unimex.edu.mx o unimexver.edu.mx
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/1.webp') }}" class="d-block w-100"
                                alt="...">
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
                    <div class="col-12 mt-3">
                        <p class="text-center">
                            Elige la Licenciatura de interés y después el horario que prefieres.
                        </p>
                    </div>
                    <div class="col-12">
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
                    <div class="col-12 row" id="grupoBotones">
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
                        <div class="col-12 col-md-4">
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
                        <div class="col-12 col-md-4">
                            <div class="card" style="border: 1px solid #004b93">
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
                        <div class="col-12 col-md-4">
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
                        <div class="col-12 text-end mt-3">
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
                noPrintSelector: " .no-print ",
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
    </script>
    <script src="{{ asset('assets/js/calculadoraCuotas/app_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/combos_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/validacion.js') }}"></script>
@endsection
