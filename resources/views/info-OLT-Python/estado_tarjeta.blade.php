@extends('layouts.admin')
@section('contenido')
   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('info-olt.index',$tarjetas->idolt) }}">{{ $tarjetas->nombreolt }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tarjeta 0/{{ $slotud }}</li>
        </ol>
    </nav>
  

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de la
                        OLT</div>

                    <ul class="list-group list-group-flush">
                       
                        <a href="{{ route('estado_tarjeta.estado_tarjeta',$tarjetas->idtarjeta_olt) }}" onclick="mostrarSpinner();" >
                            <li class="list-group-item"><i class="fa fa-server text-color-icono  mr-2"></i> Estado de la Tarjeta 0/{{ $slotud }}</li>
                        </a>


                    </ul>

                </div>
            </div>
            <div class="col-xl-9 mb-4 full-height">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">

                            <div class="py-1">
                                <h6 class="m-0 font-weight-bold text-primary" style="display: flex; justify-content: space-between;">
                                    <div>
                                        <i class="fa fa-server"></i> Tarjeta 0/{{ $slotud }} de la olt : {{ $tarjetas->nombreolt }} &nbsp;|&nbsp;  
                                        <img src="{{ asset('img/semaforo-green.gif') }}" alt="GIF" style="width: 20px; height: 20px; text-align:left;" >
                                        {{ $onlineCount }} Online &nbsp; 
                                        <img src="{{ asset('img/semaforo-red.gif') }}" alt="GIF Rojo" style="width: 20px; height: 20px; text-align: left;">
                                        {{ $offlineCount }} Offline &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
                                    </div>
                                
                                    <div>
                                        <span style="float: right;"><i class="fa fa-list"></i> Total de registros: {{ $total }}</span>
                                    </div>
                                </h6>
                                
                            </div>
            

                        </div>
                        <div class="table-container">

                            <div class="table-responsive table-scroll" id="tableScroll">
                                <br>
                                <table class="table table-hover table-sm table-bordered " id="tablaDatos"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Puerto</th>    
                                            <th style="text-align: center">Tipo</th>
                                            <th style="text-align: center">Distancia min</th>    
                                            <th style="text-align: center">Distancia max</th>
                                            <th style="text-align: center">Módulo Óptico </th>
                                            <th style="text-align: center">Opciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(collect($datos)->sortBy('port') as $dato)
                                            <tr>
                                                <td style="text-align: center">Puerto: {{ $dato->port }}</td>
                                                <td style="text-align: center">{{ $dato->type }}</td>
                                                <td style="text-align: center">{{ $dato->mindistance }}</td> 
                                                <td style="text-align: center">{{ $dato->maxdistance }}</td>
                                                @if ($dato->status == "Online")
                                                <td style="text-align: center"><span class="badge badge-success palpitando">Activo</span></td>
                                                @else
                                                <td style="text-align: center"><span class="badge badge-success palpitandored">Inactivo</span></td> 
                                                @endif
                                                <td style="text-align: center"><a href="{{ route('clientes_puerto.clientes_puerto', ['tarjeta' => $tarjetas->idtarjeta_olt, 'puerto_tarj' => $dato->port]) }}", onclick="mostrarSpinner();" type="button" class="btn btn-primary btn-sm">Ver clientes </a></td>
                                            </tr>
                                        @endforeach
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Función para ocultar la última fila de la tabla
        function ocultarUltimaFila() {
            const tabla = document.getElementById('tablaDatos');
            const ultimaFila = tabla.rows[tabla.rows.length - 1];
            ultimaFila.style.display = 'none';
        }

        // Llamar a la función al cargar la página
        window.addEventListener('DOMContentLoaded', ocultarUltimaFila);
    </script>
@endsection