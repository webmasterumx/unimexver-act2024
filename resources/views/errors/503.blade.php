@extends('layouts.layoutError')

@section('titulo')
    Sitio en mantenimiento
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <img class="img-fluid" width="150px" src="{{ asset('assets/img/extras/acercade/principal.png') }}" alt="">
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-center">
                <img src="{{ asset('assets/img/leon_mantenimiento_2.png') }}" width="400px" class="img-fluid m-auto" alt="">
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-center">
                <p style="font-size: 150px;">
                    503
                </p>
                <p class="fs-1">
                    UPS! LO SENTIMOS
                </p>
                <p class="fs-3">
                    Sitio en mantenimiento
                </p>
                {{-- <a href="{{ route('inicio') }}" class="btn btn-primary">Recargar la página</a> --}}
            </div>
        </div>
    </section>
@endsection