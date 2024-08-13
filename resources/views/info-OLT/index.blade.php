    @extends('layouts.admin')
    @section('contenido')
        @foreach ($olt as $olts)
        @endforeach
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $olts->nombre }}</li>
            </ol>
        </nav>
        <form id="miFormulario_Info_mcud" method="POST" action="{{ url('info_mcud') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $olts->idolt }}">
            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
            <input type="hidden" name="od" value="{{ $olts->puerto }}">
            <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
            <input type="hidden" name="ad" value="{{ $password }}">
        </form>
        <form id="miFormulario_Tiempo_activo" method="POST" action="{{ url('tiempo_activo') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $olts->idolt }}">
            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
            <input type="hidden" name="od" value="{{ $olts->puerto }}">
            <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
        <input type="hidden" name="ad" value="{{ $password }}">
        </form>
        <form id="miFormulario_Revisar_log" method="POST" action="{{ url('revisar_log') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $olts->idolt }}">
            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
            <input type="hidden" name="od" value="{{ $olts->puerto }}">
            <input type="hidden" name="ed" value="root">
            <input type="hidden" name="ad" value="SimanTec2075**%">
        </form>
        <form id="miFormulario_Busqueda_sn" method="POST" action="{{ url('busqueda_sn') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $olts->idolt }}">
            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
            <input type="hidden" name="od" value="{{ $olts->puerto }}">
            <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
        <input type="hidden" name="ad" value="{{ $password }}">
        </form>
        <form id="miFormulario_Trafico_olt" method="POST" action="{{ url('trafico_olt') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $olts->idolt }}">
            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
            <input type="hidden" name="od" value="{{ $olts->puerto }}">
            <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
        <input type="hidden" name="ad" value="{{ $password }}">
        </form>
       

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de
                            la OLT</div>

                        <ul class="list-group list-group-flush">

                            <a href="#" onclick="enviarFormulario_Busqueda_sn();">
                                <li class="list-group-item"><i class="fa fa-search text-color-icono  mr-2"></i> Busqueda por
                                    SN
                                </li>
                            </a>
                            <a href="#" onclick="enviarFormulario_Trafico_olt(); mostrarSpinner();">
                                <li class="list-group-item"><i class="fa fa-chart-line     text-color-icono  mr-2"></i> Trafico OLT
                                </li>
                            </a>
                         
                           <!-- Botón que activa el modal -->
<a href="#" data-toggle="modal" data-target="#confirmModal">
    <li class="list-group-item"><i class="fa fa-retweet text-color-icono mr-2"></i> Reiniciar Olt</li>
</a>

<!-- Modal de confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas reiniciar el Olt?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmButton" onclick=" mostrarSpinner();" >Confirmar</button>
            </div>
        </div>
    </div>
</div>
                            <a href="#" onclick="enviarFormulario_Tiempo_activo(); mostrarSpinner();">
                                <li class="list-group-item"><i class="fa fa-clock text-color-icono  mr-2"></i> Tiempo de
                                    Actividad</li>
                            </a>
                            <a href="#" onclick="enviarFormulario_Info_mcud(); mostrarSpinner();">
                                <li class="list-group-item"><i class="fa fa-check-square text-color-icono mr-2"></i> Mecud
                                    Activa</li>
                            </a>
                            <a href="{{ route('probar_conexion_ssh.probar_conexion_ssh',$olts->idolt) }}" onclick="mostrarSpinner();">
                                <li class="list-group-item"><i class="fa fa-info-circle text-color-icono mr-2"></i>
                                    Conexión SSh</li>
                            </a>
                            <a href="#" onclick="enviarFormulario_Revisar_log(); mostrarSpinner();">
                                <li class="list-group-item"><i class="fa fa-cog text-color-icono  mr-2"></i> Revisar Log
                                </li>
                            </a>
                        


                        </ul>

                    </div>
                </div>
                <div class="col-xl-9 mb-4 full-height">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">

                                <div class="py-1">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Listado de tarjetas de la {{ $olts->nombre }}
                                    </h6>
                                </div>

                                <div class="table-container">

                                    <div class="table-responsive table-scroll">
                                        <br>
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>

                                                    <th style="text-align: center" scope="col">Nombre OLT</th>
                                                    <th style="text-align: center" scope="col">Nombre Tarjeta</th>
                                                    <th style="text-align: center" scope="col">Slot</th>
                                                    <th style="text-align: center" scope="col">Puertos</th>
                                                    <th style="text-align: center" scope="col">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tarjetas as $tarjetas)
                                                    <tr>

                                                        <td style="text-align: center">{{ $tarjetas->nombre }}</td>
                                                        <td style="text-align: center">{{ $tarjetas->nombre_tarjeta }}</td>
                                                        <td style="text-align: center">{{ $tarjetas->numero_slot }}</td>
                                                        <td style="text-align: center">{{ $tarjetas->cantidad_puerto }}</td>
                                                        <td style="text-align: center"><a type="button" href="{{ route('estado_tarjeta.estado_tarjeta',$tarjetas->idtarjeta_olt) }}" onclick="mostrarSpinner();"
                                                                class="btn btn-success btn-sm">Puertos de la tarj</a>
                                                        
                        
                                                        </td>
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
        </div>
        <script></script>
        <script>
            function enviarFormulario_Info_mcud() {
                document.getElementById('miFormulario_Info_mcud').submit();
            }
        </script>
        <script>
            function enviarFormulario_Tiempo_activo() {
                document.getElementById('miFormulario_Tiempo_activo').submit();
            }
        </script>
        <script>
            function enviarFormulario_Revisar_log() {
                document.getElementById('miFormulario_Revisar_log').submit();
            }
        </script>
        <script>
            function enviarFormulario_Busqueda_sn() {
                document.getElementById('miFormulario_Busqueda_sn').submit();
            }
        </script>
          <script>
            function enviarFormulario_Trafico_olt() {
                document.getElementById('miFormulario_Trafico_olt').submit();
            }
        </script>
    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Mostrar el spinner
            mostrarSpinner();
            // Redirigir a la ruta deseada
            window.location.href = "{{ route('reiniciar_olt.reiniciar_olt', $olts->idolt) }}";
        });
    
      
    </script>
    
  
    @endsection
