<!-- Inicio de Formulario de Contacto -->
<section class="py-3" style="background-color: #de951b;">
    <div class="container p-2">
        <div class="row">
            <div class="col-12 col-md-6 bg_contacto">
                <h5 class="text-center fw-normal" style="color: #de951b; margin-top: 10rem !important;">
                    ¿Quieres hablar
                    con un asesor o agendar cita para inscripción?
                </h5>
                <p class="text-center">
                    <i class="bi bi-telephone-fill" style="color: #ffff;"></i>
                    <a href="tel:+525511020290" target="_blank" style="color: #ffff;">
                        +52 1 55 1102 0290
                    </a>
                    <br>
                    <img src="{{ asset('assets/img/flotante/whats-2.png') }}" alt="">
                    <a href="https://wa.me/525511020290/?text=Hola!+Me+gustaría+recibir+más+información+sobre+los+programas,+cuotas+y+promociones+de+UNIMEX;+me+interesó+lo+que+vi+en+Página+Web+Metro+sobre+contacto+en+WhatsApp+(botón).+¡Gracias!"
                        target="_blank" style="color: #ffff;">
                        +52 1 55 1102 0290
                    </a>
                </p>
                <p class="text-center" style="color: #de951b;">
                    Visítanos en:
                </p>
                <p class="text-center">
                    <a href="{{ route('plantel', 'izcalli') }}" style="color: #ffff;">
                        Izcalli <br>
                        Av. Del Vidrio #15, Col. Plaza Dorada, Centro Urbano, Cuautitlán Izcalli, Estado de México.
                    </a> <br><br>
                    <a href="{{ route('plantel', 'satelite') }}" style="color: #ffff;">
                        Satélite <br>
                        Circuito Poetas #37, Cd. Satélite, Naucalpan de Juárez, Estado de México.
                    </a> <br><br>
                    <a href="{{ route('plantel', 'polanco') }}" style="color: #ffff;">
                        Polanco <br>
                        Emilio Castelar #63 esquina Eugenio Sue, Col. Polanco-Chapultepec, México D.F.
                    </a> <br><br>
                    <a href="{{ route('plantel', 'veracruz') }}" style="color: #ffff;">
                        Veracruz <br>
                        Av. 20 de noviembre esq. Juan Enríquez No. 1004 Veracruz, Ver.
                    </a>
                </p>
            </div>
            <div class="col-12 col-md-6 p-0"> <!-- form_contacto -->
                <form id="form_contacto" action="{{ route('contacto.prospecto') }}" method="POST" class="bg-white p-4 p-md-5">
                    @csrf
                    <p style="color: #004b93; font-size: 1.5em;" class="text-center">
                        ¡Estamos para ayudarte! <br>
                        Deja tus datos y nos pondremos en contacto.
                    </p>
                    <label class="border p-2 w-100 fw-light mb-0" for="nombre_prospecto"><i
                            class="bi bi-person-fill color-unimex"></i> NOMBRE *</label>
                    <div class="w-100 d-flex">
                        <div class="w-50">
                            <input class="w-100 rounded-0 form-control" type="text" name="nombre_prospecto"
                                id="nombre_prospecto" placeholder="Nombre">
                        </div>
                        <div class="w-50">
                            <input class="rounded-0 form-control" type="text" name="apellidos_prospecto"
                                id="apellidos_prospecto" placeholder="Apellidos">
                        </div>
                    </div>

                    <label class="border p-2 w-100 fw-light mt-3 mb-0" for="mail_prospecto">
                        <i class="bi bi-envelope-fill color-unimex"></i> EMAIL *</label>
                    <div class="w-100">
                        <input class="rounded-0 form-control" type="email" name="mail_prospecto" id="mail_prospecto"
                            placeholder="nombre@email.com">
                    </div>

                    <label class="border p-2 w-100 fw-light mt-3 mb-0" for="celular_prospecto">
                        <i class="bi bi-telephone-fill color-unimex"></i> TELÉFONOS DE CONTACTO *</label>
                    <div class="w-100 d-flex">
                        <div class="w-50">
                            <input class="rounded-0 form-control" type="text" name="celular_prospecto"
                                id="celular_prospecto" minlength="10" maxlength="10" placeholder="Celular a 10 digitos">
                        </div>
                        <div class="w-50">
                            <input class="rounded-0 form-control" type="text" name="telefono_prospecto"
                                id="telefono_prospecto" minlength="10" maxlength="10" placeholder="Casa a 10 digitos">
                        </div>
                    </div>

                    <label class="border p-2 w-100 fw-light mt-3 mb-0" for="plantelSelect">
                        <i class="bi bi-bookmark-fill color-unimex"></i> QUIERO ESTUDIAR EN:</label>
                    <div class="w-100 d-flex">
                        <div class="w-50">
                            <select class="form-select rounded-0" aria-label="Default select example" id="plantelSelect"
                                name="plantelSelect">
                                <option value="" selected disabled> -Selecciona Plantel- </option>

                            </select>
                            <select class="form-select rounded-0" aria-label="Default select example" id="periodoSelect"
                                name="periodoSelect">
                                <option value="" selected>Iniciar clases en: </option>
                            </select>
                        </div>
                        <div class="w-50">

                            <select class="form-select rounded-0" aria-label="Default select example" id="nivelSelect"
                                name="nivelSelect">
                                @isset($licenciatura)
                                    <option value="Licenciatura" selected>Licenciatura</option>
                                @endisset
                                @isset($licenciatura_sua)
                                    <option value="Licenciatura" selected>Licenciatura</option>
                                @endisset
                                @isset($posgrado)
                                    <option value="Especialidad" selected>Especialidad</option>
                                @endisset
                            </select>
                            <select class="form-select rounded-0" aria-label="Default select example"
                                id="carreraSelect" name="carreraSelect">
                                @isset($licenciatura)
                                    <option value="{{ $licenciatura->subtitulo }}"> {{ $licenciatura->subtitulo }}
                                    </option>
                                @endisset
                                @isset($licenciatura_sua)
                                    <option value="{{ $licenciatura_sua->titulo }}" selected>
                                        {{ $licenciatura_sua->titulo }}
                                    </option>
                                @endisset
                                @isset($posgrado)
                                    <option value="{{ $posgrado->titulo }}"> {{ $posgrado->titulo }} </option>
                                @endisset


                            </select>
                        </div>
                    </div>
                    <div class="w-100">
                        <select class="form-select rounded-0" aria-label="Default select example" id="horarioSelect"
                            name="horarioSelect">
                            <option value="" selected> Horario </option>
                        </select>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="aceptar_contacto"
                            name="aceptar_contacto" checked style="margin-top: -2%;">
                        <label class="form-check-label" for="aceptar_contacto"
                            style="margin-top: 11px; margin-left: 26px;">
                            He leído y acepto el <a href="javascript:void(0);"
                                onclick="window.open('{{ route('aviso_de_privacidad') }}','Privacidad','scrollbars=yes,width=1000,height=700')">
                                aviso de privacidad.
                                </a>
                        </label>
                    </div>
                    <div class="w-100 text-center mt-4">
                        <button id="envio_contacto" type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Fin de Formulario de Contacto -->
