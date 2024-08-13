@extends('layouts.admin')
@section('contenido')
<style>
    /* Define el estilo para la fila seleccionada */
    .selected {
        background-color: #e0e0e0; /* Cambia el color de fondo según tu preferencia */
    }

    /* Ajustes generales */
.btn-group .btn-secondary {
  background-color: #3498db;
  border-color: #3498db;
}

/* Estilo de los íconos */
.dropdown-item i {
  margin-right: 5px;
}

/* Hover */
.dropdown-item:hover {
  background-color: #3498db;
  color: white;
}

/* Estilo del botón desplegable cuando está abierto */
.btn-group.dropleft .dropdown-menu {
  margin-top: 0;
  margin-left: -1px;
}
</style>
@foreach ($olt as $olts)
@endforeach
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('/dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('info-olt.index', $olts->idolt) }}">{{ $olts->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Busqueda Serial</li>
    </ol>
</nav>
<form id="miFormulario_Busqueda_sn" method="POST" action="{{ url('busqueda_sn') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $olts->idolt }}">
    <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
    <input type="hidden" name="od" value="{{ $olts->puerto }}">
    <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
        <input type="hidden" name="ad" value="{{ $password }}">
</form>
 
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de la
                        OLT</div>

                    <ul class="list-group list-group-flush">

                        <a href="#" onclick="enviarFormulario_Tiempo_activo(); mostrarSpinner();">
                            <li class="list-group-item"><i class="fa fa-search text-color-icono  mr-2"></i> Busqueda por
                                SN
                            </li>
                        </a>
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
                                        <i class="fa fa-server"></i> Tarjeta {{ $slot }}/{{ $tarjeta }}  Puerto {{ $puerto }} de la olt : {{ $olts->nombre }} &nbsp;|&nbsp;  
                                        <img src="{{ asset('img/semaforo-green.gif') }}" alt="GIF" style="width: 20px; height: 20px; text-align:left;" >
                                        {{ $onlineCount }} Online &nbsp; 
                                        <img src="{{ asset('img/semaforo-red.gif') }}" alt="GIF Rojo" style="width: 20px; height: 20px; text-align: left;">
                                        {{ $offlineCount }} Offline &nbsp;   
                                     <i class="fa fa-list"></i> Total de registros: {{ $total }}
                                    </div>

                                </h6>
                            </div>

                        </div>
                  
                        <div class="table-container">
                            <div class="table-responsive table-scroll">
                                <table class="table table-hover table-sm tablaDatos" id="tabla" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        
                                            <th style="text-align: center; font-size: 13px;">ONU_Id</th>
                                            <th style="text-align: center; font-size: 13px;">Serial</th>
                                            <th style="text-align: center; font-size: 13px;">Nombre</th>
                                            <th style="text-align: center; font-size: 13px;">Estado</th>
                                            <th style="text-align: center; font-size: 13px;">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datos as $dato)
                                           @foreach ($datos2 as $dato2 )
                                           @if ($dato->onu == $dato2->onu_id)
                                        <tr onclick="selectRow(this)">
                                        
                                            <td style="text-align: center; font-size: 12px;">{{ $dato->onu }}</td>
                                            <td style="text-align: center; font-size: 12px;">{{ $dato->sn }}</td>
                                            
                                            <td style="text-align: left; font-size: 12px;">{{ $dato2->descripcion }}</td>
                                            @if ($dato->estado =="online")
                                            <td style="text-align: center"><span class="badge badge-success palpitando">Activo</span></td>
                                            @else
                                            <td style="text-align: center"><span class="badge badge-success palpitandored">Inactivo</span></td>
                                            @endif
                                            <td style="text-align: center; font-size: 12px;">
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary btn-sm" type="button">
                                                        
                                                                  Opciones 
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#" onclick="mostrarResultado('{{ route('detalle_onu_cliente2.detalle_onu_cliente2', ['olt_id'=>$olts->idolt,'ipconexion'=>$olts->ipconexion ,'puerto_olt'=>$olts->puerto,'tarjeta' => $tarjeta, 'puerto_tarj' => $puerto,'onu_id'=>$dato->onu,'descripcion'=>$dato2->descripcion,'serial'=>$dato->sn]) }}'); return false;" title="Información"><i class="fa fa-info-circle"></i> Detalle ONU</a>
                                                        <a class="dropdown-item" href="#" onclick="resultadoOnuIstalada('{{ route('onu_instalada2.onu_instalada2', ['olt_id'=>$olts->idolt,'ipconexion'=>$olts->ipconexion ,'puerto_olt'=>$olts->puerto,'tarjeta' => $tarjeta, 'puerto_tarj' => $puerto,'onu_id'=>$dato->onu,'descripcion'=>$dato2->descripcion,'serial'=>$dato->sn]) }}'); return false;" title="Onu instalada"><i class="fa fa-desktop"></i> Onu instalada</a>
                                                        <a class="dropdown-item" href="#" onclick="resultadoServicePort('{{ route('onu_service_port2.onu_service_port2', ['olt_id'=>$olts->idolt,'ipconexion'=>$olts->ipconexion ,'puerto_olt'=>$olts->puerto,'tarjeta' => $tarjeta, 'puerto_tarj' => $puerto,'onu_id'=>$dato->onu,'descripcion'=>$dato2->descripcion,'serial'=>$dato->sn])}}'); return false;" title="Service Port"><i class="fa fa-plug"></i> Service Port</a>
                                                        <a class="dropdown-item" href="#" onclick="mostrarResultadoOptical('{{ route('optical_cliente2.optical_cliente2', ['olt_id'=>$olts->idolt,'ipconexion'=>$olts->ipconexion ,'puerto_olt'=>$olts->puerto,'tarjeta' => $tarjeta, 'puerto_tarj' => $puerto,'onu_id'=>$dato->onu,'descripcion'=>$dato2->descripcion,'serial'=>$dato->sn]) }}'); return false;" title="Potencia"><i class="fa fa-signal"></i> Potencia</a>
                                                        
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @include('info-OLT-Python.modal_cliente.modal_detalle_onu_cliente')
                        @include('info-OLT-Python.modal_cliente.modal_optical_ONU')
                        @include('info-OLT-Python.modal_cliente.modal_onu_instalada')
                        @include('info-OLT-Python.modal_cliente.modal_onu_service_port')
                
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
          function mostrarResultado(url) {
        // Mostrar el modal
        $('#resultadoModal').modal('show');
        
        // Cargar el contenido en el modal
        $('#resultadoContenido').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i></div><div class="message text-center">Obteniendo información...</div>');
        $('#resultadoContenido').load(url);
    }

    function mostrarResultadoOptical(url) {
        // Mostrar el modal
        $('#resultadoModalOptical').modal('show');
        
        // Cargar el contenido en el modal
        $('#resultadoContenidoOptical').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i></div><div class="message text-center">Obteniendo información...</div>');
        $('#resultadoContenidoOptical').load(url);
    }
    function resultadoOnuIstalada(url) {
        // Mostrar el modal
        $('#resultadoModalOnuIstalada').modal('show');
        
        // Cargar el contenido en el modal
        $('#resultadoContenidoOnuIstalada').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i></div><div class="message text-center">Obteniendo información...</div>');
        $('#resultadoContenidoOnuIstalada').load(url);
    }
    function resultadoServicePort(url) {
        // Mostrar el modal
        $('#resultadoModalServicePort').modal('show');
        
        // Cargar el contenido en el modal
        $('#resultadoContenidoServicePort').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i></div><div class="message text-center">Obteniendo información...</div>');
        $('#resultadoContenidoServicePort').load(url);
    }

    function selectRow(row) {
        // Quita la clase 'selected' de todas las filas
        var rows = document.querySelectorAll('.tablaDatos tbody tr');
        rows.forEach(function(row) {
            row.classList.remove('selected');
        });

        // Agrega la clase 'selected' a la fila clicada
        row.classList.add('selected');
    }

    </script>


@endsection


    


