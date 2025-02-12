@extends('layouts.layout')

@section('content')
    <section class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="underlined-head text-uppercase fw-normal" style="font-size: 1.438rem;">
                    PREGUNTAS FRECUENTES
                </h1><br>
            </div>
            @php
                $con = 0;
            @endphp
            <div class="accordion" id="accordionExample">
                @foreach ($preguntasFrecuentes as $preguntaFrecuente)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $con }}" aria-expanded="false"
                                aria-controls="collapse{{ $con }}">
                                {!! $preguntaFrecuente->pregunta !!}
                            </button>
                        </h2>
                        <div id="collapse{{ $con }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $preguntaFrecuente->respuesta !!}
                            </div>
                        </div>
                    </div>

                    @php
                        $con = $con + 1;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
@endsection

@include('include.redirecciones.outOfertaAcademica')
