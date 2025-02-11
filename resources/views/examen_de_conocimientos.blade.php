@extends('layouts.layout')

@section('titulo')
    Examen de Conocimientos | UNIMEX
@endsection


@section('content')
    <!-- Inicio de Examen de conocimientos -->
    <section class="container-fluid py-3">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <h2 class="underlined-head fw-normal">
                    EXAMEN DE <br>
                    CONOCIMIENTOS
                </h2>
            </div>
            <div class="col-12 col-md-7 col-lg-9">
                <p style="text-align: justify;">
                    Examen escrito de reactivos de opción múltiple, que se fundamenta en los conocimientos básicos
                    indispensables que se deben tener en la Licenciatura. <br>
                    Se considera una opción para el recién egresado que tiene los conocimientos recientes y actualizados.
                    <br>
                    Si deseas presentar este examen, deberás acudir a Ventanilla Única, para verificar tu status de “alumno
                    regular” y que el expediente se encuentre con la documentación completa; después deberás llenar la
                    solicitud y pagar el costo en el banco.
                </p>
                <h3>
                    Requisitos
                </h3>
                <ul>
                    <li style="text-align: justify;">Tener acreditados el 100 % de los créditos de la licenciatura.</li>
                    <li style="text-align: justify;">Certificado Total de Estudios de Licenciatura o realizar el trámite del mismo.</li>
                    <li style="text-align: justify;">Registrar la opción de titulación a través de la Solicitud Inicial para Titularse.</li>
                    <li style="text-align: justify;">Pagar el costo completo del Examen de Conocimientos una semana antes de la fecha de aplicación.</li>
                    <li style="text-align: justify;">Firmar contrato de aplicación de Examen de Conocimientos.</li>
                </ul>
                <h3>Convocatoria</h3>
                <ol type="1">
                    <li style="text-align: justify;">Periodo de inscripciones: <b>por confirmar</b></li>
                    <li style="text-align: justify;">Fecha de aplicación del examen: <b> por confirmar</b></li>
                </ol>
                <p style="text-align: justify;">
                    <b>Lugar de Aplicación: </b> Planteles UNIMEX®
                </p>
                <h3>
                    Publicación de Resultados.
                </h3>
                Términos.
                <ul>
                    <li style="text-align: justify;">
                        Este examen se puede aplicar indistintamente en cualquier plantel UNIMEX®.
                    </li>
                    <li style="text-align: justify;">
                        La calificación del examen será ACREDITADO o NO ACREDITADO (no hay revisión de examen) el resultado
                        es inapelable e irrevocable.
                    </li>
                    <li style="text-align: justify;">
                        Si el examen es aprobado, se procede a iniciar los trámites de titulación, en caso contrario se
                        puede elegir otra de las opciones de titulación.
                    </li>
                    <li style="text-align: justify;">
                        Cuando se abra la convocatoria para esta opción deberá acudir a Servicios Escolares, para verificar
                        el status de alumno regular y que el expediente se encuentre con la documentación completa, además
                        de llenar una solicitud y posteriormente pagar el costo en el banco.
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Fin de Examen de Conocimientos -->
@endsection

@include('include.redirecciones.outOfertaAcademica')
