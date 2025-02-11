@extends('layouts.layout')

@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 style="font-size: 1.438rem;" class="underlined-head">
                    RVOES
                </h1>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plantel</th>
                                <th>Materia</th>
                                <th>Nivel de Estudios</th>
                                <th>Modalidad de Estudios</th>
                                <th>RVOE</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($lista as $item)
                                <tr>
                                    <td> {{ $item['descrPlantel'] }} </td>
                                    <td> {{ $item['descrMateria'] }} </td>
                                    <td> {{ $item['descrNivel'] }} </td>
                                    <td> {{ $item['descrModalidad'] }} </td>
                                    <td> {{ $item['descrRvoe'] }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                ordering: true,
                info: true,

                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "", //(Filtrado de _MAX_ total entradas)
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    }
                },
                order: [
                    [1, 'asc']
                ],
                responsive: true,
            });

        });
    </script>
@endsection

@include('include.redirecciones.outOfertaAcademica')
