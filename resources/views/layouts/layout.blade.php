<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

    <!-- METAS -->
    @yield('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONTS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- SLICK CAROUSEL -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- ICONOS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- SWAL JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!---  DateTable --->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mediaQuery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/non-critical-styles10062022.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flotante.min.css') }}">

    @yield('styles')

</head>

<body>

    <!-- Inicio de Barra de navegacion -->
    @include('include.navegacionNew')
    @include('include.navegacion')
    <!-- Fin de Barra de navegacion -->

    <!-- Inico de Contenido -->
    @yield('content')
    <!-- Fin de Contemido -->

    <!-- Inicio de Modales -->
    @include('modales.protocolo')
    <!-- Fin de Modales -->

    <!-- Inicio de Footer -->
    <footer class="bg-footer container-fluid text-center px-5 text-white">
        <div class="row">
            <div class="col-12 mt-5">
                <p class="fs-6">SÍGUENOS</p>
            </div>
            <div class="col-12 col-md-12 mb-4">
                <a href="https://www.facebook.com/UNIMEX/" target="_blank"><img
                        src="{{ asset('assets/img/social_media/facebook.png') }}" alt=""></a>
                <a class="ms-2" href="https://www.instagram.com/universidadmexicana/" target="_blank"><img
                        src="{{ asset('assets/img/social_media/instagram.png') }}" alt=""></a>
                <a class="ms-2" href="https://mx.linkedin.com/school/universidad-mexicana/" target="_blank"><img
                        src="{{ asset('assets/img/social_media/linkedin.png') }}" alt=""></a>
                <a class="ms-2" href="https://twitter.com/soyUNIMEX/" target="_blank"><img
                        src="{{ asset('assets/img/social_media/twitter.png') }}" alt=""></a>
                <a class="ms-2" href="https://www.youtube.com/user/SoyUNIMEX" target="_blank"><img
                        src="{{ asset('assets/img/social_media/youtube.png') }}" alt=""></a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" href="{{ route('investigacion') }}" target="_blank">INVESTIGACIÓN</a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" href="http://comunimex.lat/KioscoProfesionistasInt/" target="_blank">KIOSCO DE
                    <br> PROFESIONISTAS</a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" href="https://unimex.edu.mx/soyUNIMEX/" target="_blank">BLOG SOY UNIMEX</a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" href="{{ route('aviso_de_privacidad') }}" target="_blank">AVISO DE <br>
                    PRIVACIDAD</a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" href="{{ route('preguntas.frecuentes') }}" target="_blank">PREGUNTAS <br>
                    FRECUENTES</a>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <a class="text-white" target="_blank" href="{{ route('rvoes') }}">RVOES</a>
            </div>
            <hr class="my-3">
            <div class="col-12 mb-3">
                UNIVERSIDAD MEXICANA {{ date('Y') }}®
            </div>
        </div>
    </footer>
    <!-- Fin de Footer -->

    <span class="flotante-whats">
        <button id="f-boton">
            <img class=" lazyloaded" width="80" height="70" id="f-whats-boton" alt="iamgen-whats"
                src="{{ asset('assets/img/extras/whats.webp') }}">
        </button>
        <div>
        </div>
        <div id="f-msj-boton">
            <button id="contactanos" type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Tooltip on left" style="display: none;">
                ¡Contáctanos vía<br>WhatsApp...!
            </button>
        </div>
    </span>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- slick-carousel js -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Validate -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <!-- DataTables -->
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>

    <script>
        $(document).ready(function() {
            if ($(window).width() >= 200 && $(window).width() <= 300) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 300 && $(window).width() <= 600.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 600 && $(window).width() <= 800.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 800 && $(window).width() <= 900.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 900 && $(window).width() <= 1199.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }
            if ($(window).width() >= 1199.98 && $(window).width() <= 1399.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }
            if ($(window).width() >= 1399.98 && $(window).width() <= 1500.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }

        });

        $(window).resize(function() {
            if ($(window).width() >= 200 && $(window).width() <= 300) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 300 && $(window).width() <= 600.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 600 && $(window).width() <= 800.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 800 && $(window).width() <= 900.98) {
                $("#menuLG").empty();
                $('#menuSM').html(gerenerarMenuSm());
            }
            if ($(window).width() >= 900 && $(window).width() <= 1199.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }
            if ($(window).width() >= 1199.98 && $(window).width() <= 1399.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }
            if ($(window).width() >= 1399.98 && $(window).width() <= 1500.98) {
                $("#menuSM").empty();
                $('#menuLG').html(generarMenuLg());
            }
        });

        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }

        const obtenHover = document.getElementById('f-boton'),
            mensajeW = document.getElementById('f-msj'),
            btnCerrar = document.getElementById('boton-cerrar');

        obtenHover.addEventListener('mouseover', () => {
            let mensaje = document.getElementById('f-msj-boton');
            mensaje.innerHTML = `
                <button id="contactanos" type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                    ¡Contáctanos vía<br>WhatsApp...!
                </button>
            `;
        });
        obtenHover.addEventListener('mouseout', (e) => {
            let contactanos = document.getElementById('contactanos');
            contactanos.style.display = 'none';
        });

        /*mostrar planteles y whats*/
        obtenHover.addEventListener('click', () => {

            window.open(
                'https://api.whatsapp.com/send/?phone=525511020290&text=Hola%21+Me+gustaría+recibir+más+información+sobre+los+programas%2C+cuotas+y+promociones+de+UNIMEX%3B+me+interesó+lo+que+vi+en+Página+Web+Veracruz+sobre+contacto+en+WhatsApp+%28botón%29.+¡Gracias%21&type=phone_number&app_absent=0'
                );
        });

        /*
         *   codigo de redireccionamiento dinamico para contacto 
         *   #contactoHeader se asume que entra al formulario desde la parte de contacto que este en el menu
         *   -> formularioContactanos
         *   #contactoBolsaTrabajo se asume que entra al formulario desde la parte de bolsa de trabajo por ello
         *   se hara enfasis en dicho formulario
         *   -> formularioTrabajaUnimex
         * 
         */
        function redirectContactHeader() {
            console.log("entra al formulario desde la parte de contacto");
            let elementForm = "formularioContactanos";

            $.ajax({
                method: "GET",
                url: setUrlBase() + "set/variables/contactForm/" + elementForm,
            }).done(function(data) {
                console.log(data);

            }).fail(function() {
                console.log("Algo salió mal");
            });
            //window.open("{{ route('contacto') }}");
            window.location.href = "{{ route('contacto') }}";
        }

        $('#linkSmContacto').click(function(event) {
            console.log("entra al formulario desde la parte de contacto");
            let elementForm = "formularioContactanos";

            $.ajax({
                method: "GET",
                url: setUrlBase() + "set/variables/contactForm/" + elementForm,
            }).done(function(data) {
                console.log(data);

            }).fail(function() {
                console.log("Algo salió mal");
            });
            window.open("{{ route('contacto') }}", '_blank');
        });

        function redirectContactBolsaTrabajo() {
            console.log("entra al formulario desde la parte de bolsa de trabajo");

            let elementForm = "formularioTrabajaUnimex";

            $.ajax({
                method: "GET",
                url: setUrlBase() + "set/variables/contactForm/" + elementForm,
            }).done(function(data) {
                console.log(data);

            }).fail(function() {
                console.log("Algo salió mal");
            });
            window.open("{{ route('contacto') }}", '_blank');
        }

        function gerenerarMenuSm() {
            let menu = `
            <noscript>Por favor habilita JavaScript para usar este sitio</noscript>
            <nav class="navigation">
                <div class="wrapper d-flex">
                    <a href="{{ route('inicio') }}" rel="noopener noreferrer">
                        <img class="logo lazyload" src="{{ asset('assets/img/header/logo-2020.webp') }}" width="259"
                            height="80" alt="Logo Institucional de Universidad Mexicana"
                            title="Universidad Mexicana, educación que se adapta a ti.">
                    </a>
                    <div class="menu" id="navigation">
                        <a class="btn-close-nav" onclick="nav.hide()"></a>
                        <ul>
                            <li>
                                <a onclick="subnav.show('subnavAbout')"
                                    title="Conoce la hisotria de Universidad Mexicana">Acerca de UNIMEX </a>
                            </li>
                            <li>
                                <a onclick="subnav.show('subnavAcademicOffer')"
                                    title="Conoce nuestras Licenciaturas, Maestrías y Posgrados">Oferta Académica</a>
                            </li>
                            <li>
                                <a onclick="subnav.show('subnavSchools')" title="Conoce nuestros 4 Planteles">Planteles</a>
                            </li>
                            <li>
                                <a onclick="subnav.show('alumnosegresados')"
                                    title="Servicios para nuestos Alumnos y Egresados">Alumnos Y Egresados</a>
                            </li>
                            <li>
                                <a id="linkSmContacto" href="#" title="¿Necesitas ayuda?">Contacto</a>
                            </li>
                            <li>
                                <a id="linkCalculaTuBeca" style="color: #004b93;" href="javascript:calculadoraHeader();" rel="noopener"
                                    title="Calcula tu Cuota">Calculadora de Cuotas</a>
                            </li>
                            <li>
                                <a id="linkPreinscripcionEnLinea" style="color: #004b93;" href="javascript:preinscripcionHeader()" rel="noopener"
                                    title="Calcula tu Cuota">Preinscripción en línea</a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('contacto') }}" id="anclaresgistrate">INFORMES</a>
                    <a href="{{ route('contacto') }}" id="anclaresgistratepages">INFORMES</a>
                    <a class="toggler" onclick="nav.show()"></a>
                </div>
            </nav>
            <div class="wrapper">
                <nav class="subnav" id="subnavAbout">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavAbout')"></a>
                    <div class="container">
                        <div class="row">
                            @foreach ($data['acercade'] as $acerca)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                                    <h5 class="hide">
                                        <a href="{{ route('acercade', $acerca->slug) }}"> {{ $acerca->nombre }} </a>
                                    </h5>
                                    <div class="card">
                                        <a href="{{ route('acercade', $acerca->slug) }}">
                                            <div class="parent">
                                                <div class="child {{ $acerca->clase_img }}">
                                                    <span class="linka"> {{ $acerca->nombre }} </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">
                                                {!! $acerca->descripcion !!}
                                            </p>
                                            <a href="{{ route('acercade', $acerca->slug) }}"
                                                class="btn btn-primary btn-arrow-go"> {{ $acerca->nombre }} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="subnavSchools">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavSchools')"></a>
                    <div class="container">
                        <div class="row">
                            @foreach ($data['planteles'] as $plantel)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                                    <h5 class="hide">
                                        <a href="{{ route('plantel', $plantel->nombre) }}">
                                            {{ $plantel->nombre }}</a>
                                    </h5>
                                    <div class="card" style="min-height: 1px;">
                                        <a href="{{ route('plantel', $plantel->nombre) }}">
                                            <div class="parent">
                                                <div class="child {{ $plantel->clase_img }}">
                                                    <span class="linka text-capitalize">{{ $plantel->nombre }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <br>
                                            </p>
                                            <a href="{{ route('plantel', $plantel->nombre) }}"
                                                class="btn btn-primary btn-arrow-go">Plantel {{ $plantel->nombre }} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="alumnosegresados">
                    <a class="btn-close-nav" onclick="subnav.hide('alumnosegresados')"></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                <h5 class="hide top-gray-border">
                                    <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank"
                                        rel="noopener">Kiosco en Línea</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="http://comunimex.lat/kioscoalumnosresponsive/">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-kiosco">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank"
                                                rel="noopener"><span class="blue-text">Kiosco en Línea</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener">Correo
                                        ComUNIMEX</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="http://portal.microsoftonline.com/">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-correo">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener"><span
                                                    class="blue-text">Correo ComUNIMEX</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('examen_de_conocimientos') }}" target="_blank" rel="noopener">Examen
                                        de Conocimientos</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="{{ route('examen_de_conocimientos') }}">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-examen">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="{{ route('examen_de_conocimientos') }}" target="_blank"
                                                rel="noopener"><span class="blue-text">Examen de
                                                    Conocimientos</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                                        rel="noopener">Resultados
                                        del Examen de Conocimientos</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-resultadoexamen">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                                                rel="noopener"><span class="blue-text">Resultados del Examen de
                                                    Conocimientos</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--nuevo-->
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12  left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                        rel="noopener noreferrer">Calendarios Escolares</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-calendario">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="text-align: center;">
                                                <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <span class="blue-text">Calendarios Escolares</span></a>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--termina-->

                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">Recomienda
                                        UNIMEX®</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-recomienda">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="javascript:void(0);"
                                                onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')"><span
                                                    class="blue-text">Recomienda UNIMEX®</span></a>

                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="opciones-de-titulacion" target="_blank" rel="noopener">Opciones de
                                        Titulación</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="opciones-de-titulacion" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-titulacion">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="opciones-de-titulacion" target="_blank" rel="noopener"><span
                                                    class="blue-text">Opciones de Titulación</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="servicio-social" target="_blank" rel="noopener">Servicio Social</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="servicio-social" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-serviciosocial">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="servicio-social" target="_blank" rel="noopener"><span
                                                    class="blue-text">Servicio Social</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">Reglamento
                                        UNIMEX®</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-reglamento">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="javascript:void(0);"
                                                onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')"><span
                                                    class="blue-text">Reglamento UNIMEX®</span></a>

                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--nueva bolsa de trabajo-->
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('bolsa_de_trabajo') }}" target="_blank" rel="noopener"
                                        aria-label="Bolsa de Trabajo UNIMEX">Bolsa de Trabajo</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="{{ route('bolsa_de_trabajo') }}"
                                        aria-label="Bolsa de Trabajo UNIMEX">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-trabajo">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="{{ route('bolsa_de_trabajo') }}" target="_blank" rel="noopener"
                                                aria-label="Bolsa de Trabajo UNIMEX">
                                                <span class="blue-text">Bolsa de Trabajo</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide"> <a id="modal-protocolo-click">Protocolo para el regreso a clases
                                        presenciales</a></h5>
                                <div class="card" style="min-height: 150px;">
                                    <a id="modal-protocolo-click">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-protocolo"> <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a id="modal-protocolo-click"> <span class="blue-text">Protocolo para el
                                                    regreso a clases presenciales</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="subnavAcademicOffer">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavAcademicOffer')"></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ">
                                <h5 onclick="subnav.list.toggle('bachelorsDegree')" id="bachelorsDegree">Licenciaturas
                                </h5>
                                <ul class="blue-bullet">
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 1)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 2 && $menu->mostrar == 1)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTEL VERACRUZ</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 3)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                                <h5 onclick="subnav.list.toggle('SUA')" id="SUA">Licenciaturas abiertas SUA<br></h5>
                                <ul class="blue-bullet">
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 4)
                                            <li>
                                                <a href="{{ route('licenciatura.sua', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                                <h5 onclick="subnav.list.toggle('masterDegree')" id="masterDegree">Posgrados</h5>
                                <ul class="blue-bullet">

                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 5)
                                            <li>
                                                <a href="{{ route('posgrado', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    {{-- <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS </span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 6)
                                            <li>
                                                <a href="{{ route('posgrado', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            `;

            return menu;
        }

        function generarMenuLg() {
            let menu = `
            <noscript>Por favor habilita JavaScript para usar este sitio</noscript>
            <nav class="navigation" style="background-color: #013F7A !important; padding: 8px 0px !important;">
                <div class="wrapper d-flex">
                    <a href="{{ route('inicio') }}" rel="noopener noreferrer">
                        {{--  <img class="logo lazyload" src="{{ asset('assets/img/header/logo-2020.webp') }}" width="259"
                            height="80" alt="Logo Institucional de Universidad Mexicana"
                            title="Universidad Mexicana, educación que se adapta a ti."> --}}
                    </a>
                    <div class="menu" id="navigation1">
                        <a class="btn-close-nav" onclick="nav.hide()"></a>
                        <ul>
                            <li>
                                <a onclick="subnav.show('subnavAbout')"
                                    title="Conoce la hisotria de Universidad Mexicana">Acerca
                                    de UNIMEX </a>
                            </li>
                            <li>
                                <a onclick="subnav.show('alumnosegresados')"
                                    title="Servicios para nuestos Alumnos y Egresados">Alumnos Y Egresados</a>
                            </li>
                            <li>
                                <a id="contactoHeader" href="javascript:redirectContactHeader()"
                                    title="Servicios para nuestos Alumnos y Egresados">Informes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navigation d-flex" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                <div class="wrapper d-flex w-25 ps-2" style="justify-content: flex-start;">
                    <a href="{{ route('inicio') }}" rel="noopener noreferrer">
                        <img class="logo lazyload" src="{{ asset('assets/img/header/logo-2020.webp') }}" width="259"
                            height="80" alt="Logo Institucional de Universidad Mexicana"
                            title="Universidad Mexicana, educación que se adapta a ti.">
                    </a>
                    {{--  <p class="text-white ml-3">
                        Plantel: <br>
                        <b>CDMX</b>
                    </p> --}}
                </div>

                <div class="wrapper d-flex" style="justify-content: flex-end;">
                    <div class="menu" id="navigation1">
                        <a class="btn-close-nav" onclick="nav.hide()"></a>
                        <ul>
                            <li class="mt-2">
                                <a onclick="subnav.show('subnavAcademicOffer')"
                                    title="Conoce nuestras Licenciaturas, Maestrías y Posgrados">Oferta Académica</a>
                            </li>
                            <li class="mt-2">
                                <a onclick="subnav.show('subnavSchools')" title="Conoce nuestros 4 Planteles">Planteles</a>
                            </li>
                            <li class="text-center">
                                <button id="calculadoraHeader" onclick="calculadoraHeader();" class="btn btn-outline-warning">CALCULADORA DE CUOTAS</button>
                            </li>
                            <li class="text-center">
                                <button id="preinscripcionHeader" onclick="preinscripcionHeader()" class="btn btn-outline-warning">PREINSCRIPCIÓN EN
                                    LINEA</button>
                            </li>
                        </ul>
                    </div>
                    <a class="toggler-laravel" onclick="nav.show()"></a>
                </div>
            </nav>
            <div class="wrapper">
                <nav class="subnav" id="subnavAbout">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavAbout')"></a>
                    <div class="container">
                        <div class="row">
                            @foreach ($data['acercade'] as $acerca)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                                    <h5 class="hide">
                                        <a href="{{ route('acercade', $acerca->slug) }}"> {{ $acerca->nombre }} </a>
                                    </h5>
                                    <div class="card">
                                        <a href="{{ route('acercade', $acerca->slug) }}">
                                            <div class="parent">
                                                <div class="child {{ $acerca->clase_img }}">
                                                    <span class="linka"> {{ $acerca->nombre }} </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">
                                                {!! $acerca->descripcion !!}
                                            </p>
                                            <a href="{{ route('acercade', $acerca->slug) }}"
                                                class="btn btn-primary btn-arrow-go"> {{ $acerca->nombre }} </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="subnavSchools">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavSchools')"></a>
                    <div class="container">
                        <div class="row">
                            @foreach ($data['planteles'] as $plantel)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                                    <div class="card" style="min-height: 1px;">
                                        <a href="{{ route('plantel', $plantel->nombre) }}">
                                            <div class="parent">
                                                <div class="child {{ $plantel->clase_img }}">
                                                    <span class="linka text-capitalize">{{ $plantel->titulo }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <br>
                                            </p>
                                            <a href="{{ route('plantel', $plantel->nombre) }}"
                                                class="btn btn-primary btn-arrow-go">Plantel {{ $plantel->titulo }} &nbsp; <i
                                                    class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="alumnosegresados">
                    <a class="btn-close-nav" onclick="subnav.hide('alumnosegresados')"></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                <h5 class="hide top-gray-border">
                                    <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank"
                                        rel="noopener">Kiosco en Línea</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="http://comunimex.lat/kioscoalumnosresponsive/">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-kiosco">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank"
                                                rel="noopener"><span class="blue-text">Kiosco en Línea</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener">Correo
                                        ComUNIMEX</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="http://portal.microsoftonline.com/">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-correo">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener"><span
                                                    class="blue-text">Correo ComUNIMEX</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('examen_de_conocimientos') }}" target="_blank" rel="noopener">Examen
                                        de Conocimientos</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="{{ route('examen_de_conocimientos') }}">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-examen">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="{{ route('examen_de_conocimientos') }}" target="_blank"
                                                rel="noopener"><span class="blue-text">Examen de
                                                    Conocimientos</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                                        rel="noopener">Resultados
                                        del Examen de Conocimientos</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-resultadoexamen">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                                                rel="noopener"><span class="blue-text">Resultados del Examen de
                                                    Conocimientos</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--nuevo-->
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12  left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                        rel="noopener noreferrer">Calendarios Escolares</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-calendario">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="text-align: center;">
                                                <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <span class="blue-text">Calendarios Escolares</span></a>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!--termina-->

                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">Recomienda
                                        UNIMEX®</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-recomienda">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="javascript:void(0);"
                                                onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')"><span
                                                    class="blue-text">Recomienda UNIMEX®</span></a>

                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="opciones-de-titulacion" target="_blank" rel="noopener">Opciones de
                                        Titulación</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="opciones-de-titulacion" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-titulacion">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="opciones-de-titulacion" target="_blank" rel="noopener"><span
                                                    class="blue-text">Opciones de Titulación</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="servicio-social" target="_blank" rel="noopener">Servicio Social</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="servicio-social" target="_blank" rel="noopener">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-serviciosocial">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="servicio-social" target="_blank" rel="noopener"><span
                                                    class="blue-text">Servicio Social</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('https://testing.unimex.edu.mx/reglamento.html','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">Reglamento
                                        UNIMEX®</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a href="javascript:void(0);"
                                        onClick="window.open('https://testing.unimex.edu.mx/reglamento.html','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-reglamento">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="javascript:void(0);"
                                                onClick="window.open('https://testing.unimex.edu.mx/reglamento.html','Reglamento UNIMEX','scrollbars=no,width=580,height=600')"><span
                                                    class="blue-text">Reglamento UNIMEX®</span></a>

                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--nueva bolsa de trabajo-->
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide">
                                    <a href="{{ route('bolsa_de_trabajo') }}" target="_blank" rel="noopener"
                                        aria-label="Bolsa de Trabajo UNIMEX">Bolsa de Trabajo</a>
                                </h5>
                                <div class="card" style="min-height: 150px;">
                                    <a target="_blank" rel="noopener" href="{{ route('bolsa_de_trabajo') }}"
                                        aria-label="Bolsa de Trabajo UNIMEX">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-trabajo">
                                                <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a href="{{ route('bolsa_de_trabajo') }}" target="_blank"
                                                rel="noopener" aria-label="Bolsa de Trabajo UNIMEX">
                                                <span class="blue-text">Bolsa de Trabajo</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                                <h5 class="hide"> <a id="modal-protocolo-click">Protocolo para el regreso a clases
                                        presenciales</a></h5>
                                <div class="card" style="min-height: 150px;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#protocoloRegresoClases"
                                        id="modal-protocolo-click">
                                        <div class="parent" style="width: 150px;">
                                            <div class="children bg-protocolo"> <span class="linka">Ver Más</span>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">
                                            <a id="modal-protocolo-click"> <span class="blue-text">Protocolo para el
                                                    regreso a clases presenciales</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <nav class="subnav" id="subnavAcademicOffer">
                    <a class="btn-close-nav" onclick="subnav.hide('subnavAcademicOffer1')"></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ">
                                <h5 onclick="subnav.list.toggle('bachelorsDegree1')" id="bachelorsDegree1">Licenciaturas
                                </h5>
                                <ul class="blue-bullet">
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 1)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                       @if ($menu->estado == 2 && $menu->mostrar == 1)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTEL VERACRUZ</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 3)
                                            <li>
                                                <a href="{{ route('licenciatura', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                                <h5 onclick="subnav.list.toggle('SUA1')" id="SUA1">Licenciaturas abiertas SUA<br></h5>
                                <ul class="blue-bullet">
                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 4)
                                            <li>
                                                <a href="{{ route('licenciatura.sua', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                                <h5 onclick="subnav.list.toggle('masterDegree1')" id="masterDegree1">Posgrados</h5>
                                <ul class="blue-bullet">

                                    <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 5)
                                            <li>
                                                <a href="{{ route('posgrado', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    {{-- <li style="background: none;">
                                        <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS </span>
                                    </li>
                                    @foreach ($data['menus'] as $menu)
                                        @if ($menu->estado == 6)
                                            <li>
                                                <a href="{{ route('posgrado', $menu->slug) }}">
                                                    {{ $menu->nombre }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            `;

            return menu;
        }
    </script>

    @yield('scripts')

</body>

</html>
