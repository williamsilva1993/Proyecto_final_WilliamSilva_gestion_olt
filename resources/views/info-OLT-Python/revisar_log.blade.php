@extends('layouts.admin')
@section('contenido')
    @foreach ($olt as $olts)
    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('info-olt.index', $olts->idolt) }}">{{ $olts->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Revisar Log</li>
        </ol>
    </nav>
    <form id="miFormulario_Revisar_log" method="POST" action="{{ url('revisar_log') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $olts->idolt }}">
        <input type="hidden" name="d" value="{{ $olts->ipconexion }}">
        <input type="hidden" name="od" value="{{ $olts->puerto }}">
        <input type="hidden" name="ed" value="root">
        <input type="hidden" name="ad" value="SimanTec2075**%">
    </form>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de la
                        OLT</div>

                    <ul class="list-group list-group-flush">

                        <a href="#" onclick="enviarFormulario_Revisar_log(); mostrarSpinner();">
                            <li class="list-group-item"><i class="fa fa-cog text-color-icono  mr-2"></i> Revisar Log</li>
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
                                    Registro de eventos o actividades: {{ $olts->nombre }}
                                </h6>
                            </div>


                        </div>
                    

                            <div class="table-responsive table-scroll">
                                <br>
                                <div class="card mb-4 py-3 border-bottom-success">
                                    <div class="card-body">
                                        <pre>{{ $resultado }}</pre>
                                    </div>
                                </div>
                                    
                            </div>
                       

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function enviarFormulario_Revisar_log() {
            document.getElementById('miFormulario_Revisar_log').submit();
        }
    </script>
@endsection
