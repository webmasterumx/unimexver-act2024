@extends('layouts.layout')

@section('titulo')
    Registro Exitoso | UNIMEX
@endsection

@section('content')
    <section class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h2 class="underlined-head">
                    ¡REGISTRO <br> EXITOSO!
                </h2>
            </div>
            <div class="col-12 col-md-9 col-lg-10 text-justify">
                <p class="text-center">
                    <img style="width: 40px;" src="{{ asset('assets/img/extras/good.png') }}" alt="Registro Exitoso"> <br> <br>
                    Gracias: {{ $datos->nombre_prospecto }}
                    Tus datos de registro son: <br>
                    Folio: <b>{{ $respuesta['FolioCRM'] }}</b> <br>
                    Plantel: <b>{{ $respuesta['Plantel'] }}</b> <br>
                    Nivel: <b>{{ $respuesta['Nivel'] }}</b> <br>
                    Carrera: <b>{{ $respuesta['Carrera'] }}</b> <br><br>
                    Pronto nos pondremos en contacto contigo para orientarte y solucionar todas tus dudas. <br>
                    Ven al plantel y conócenos. <br>
                    Te esperamos de: Lunes a Viernes de 8:00 am - 9:00pm y los Sábados de 9:00 am a 4:00 pm. <br>
                    O comunícate a tu plantel para más información: <br><br>
                    IMPRIME ESTA PANTALLA Y ENTRÉGALA EN PLANTEL PARA PRESENTAR TU EXAMEN DE UBICACIÓN SIN COSTO. <br>
                </p>
                <button class="btn btn-primary">Imprimir</button>
            </div>
        </div>
    </section>
@endsection
