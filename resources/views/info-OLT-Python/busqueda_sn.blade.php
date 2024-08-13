@extends('layouts.admin')
@section('contenido')
    @foreach ($olt as $olts)
    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
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

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de la
                        OLT</div>

                    <ul class="list-group list-group-flush">

                        <a href="#" onclick="enviarFormulario_Busqueda_SN(); mostrarSpinner();">
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
                                <h6 class="m-0 font-weight-bold text-primary">
                                    {{ $olts->nombre }}: Encuentra la Onu por el numero de serie
                                </h6>
                            </div>


                        </div>
                        <br>
                        <div class="container mt-12">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                 <form id="miFormulario_Resultado_busqueda_sn" method="POST" action="{{ url('resultado_busqueda_sn') }}">
                                        @csrf
                                        <div class="input-group">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $olts->idolt }}">
                                            <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
                                            <input type="hidden" name="od" value="{{ $olts->puerto }}">
                                            <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
                                            
                                            <input type="hidden" name="ad" value="{{ $password }}">
                                            <input type="text" name="sn" class="form-control" placeholder="Buscar...">
                                            <!-- Botón de búsqueda -->
                                            <button class="btn btn-primary" onclick="enviarFormulario_Resultado_busqueda_sn();mostrarSpinner();" type="button">Buscar</button>
                                        </div>
                                 </form>

                                </div>
                            </div>
                        </div>

                        <div class="table-container">

                            <div class="table-responsive table-scroll">
                                <br>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>

                                            <th style="text-align: center" scope="col">OLT</th>
                                            <th style="text-align: center" scope="col">C/T/P</th>
                                            <th style="text-align: center" scope="col">Serie</th>
                                            <th style="text-align: center" scope="col">Nombre</th>
                                            <th style="text-align: center" scope="col">Estado</th>
                                            <th style="text-align: center" scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <td colspan="6" class="text-center">No hay datos que mostrar</td>
                                        </tr>

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
        function enviarFormulario_Busqueda_SN() {
            document.getElementById('miFormulario_Busqueda_sn').submit();
        }
    </script>
        <script>
            function enviarFormulario_Resultado_busqueda_sn() {
                document.getElementById('miFormulario_Resultado_busqueda_sn').submit();
            }
        </script>
@endsection
