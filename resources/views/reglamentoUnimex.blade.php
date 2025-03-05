@extends('layouts.layout')

@section('titulo')
    Reglamento | UNIMEX
@endsection

@section('content')
    <section class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Reglamento UNIMEX<sup>®</sup></h1>
            </div>
            <div class="col-12 col-md-6 text-center">
                <a target="_blank" class="link-dark" href="{{ asset('assets/pdf/reglamentoum.pdf') }}">
                    <img src="{{ asset('assets/img/nav/reglamento.webp') }}" alt=""><br>
                    Reglamento UNIMEX<sup>®</sup>
                </a>

            </div>
            <div class="col-12 col-md-6 text-center">
                <a target="_blank" class="link-dark"
                    href="{{ asset('assets/pdf/PROTOCOLO_CONTRA_ACTOS_DE_VIOLENCIA_UNIMEX.pdf') }}">
                    <img src="{{ asset('assets/img/nav/reglamento.webp') }}" alt=""><br>
                    Protocolos UNIMEX<sup>®</sup>
                </a>

            </div>
        </div>
    </section>
@endsection

@include('include.redirecciones.outOfertaAcademica')
