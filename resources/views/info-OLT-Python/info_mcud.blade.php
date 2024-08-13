@extends('layouts.admin')
@section('contenido')
@foreach ($olt as $olts )
@endforeach
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('info-olt.index',$olts->idolt) }}">{{ $olts->nombre }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información MCUD</li>
    </ol>
</nav>
<form id="miFormulario_Info_mcud" method="POST" action="{{ url('info_mcud') }}">
    @csrf
    <input type="hidden" name="id" value="{{  $olts->idolt}}">
    <input type="hidden" name="d" value="{{  $olts->ipconexion}}">
    <input type="hidden" name="od" value="{{ $olts->puerto}}">
    <input type="hidden" name="ed" value="{{ Auth::user()->name }}">
    <input type="hidden" name="ad" value="{{ $password }}">
</form>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active" style="background: #12bbad;"> Opciones de la OLT</div>

                    <ul class="list-group list-group-flush">
                      
                       
                        <a href="#" onclick="enviarFormulario_Info_mcud(); mostrarSpinner();">
                            <li class="list-group-item"><i class="fa fa-check-square text-color-icono mr-2"></i> Mecud
                                Activa</li>
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
                                        MCUD activa del Equipo: {{ $olts->nombre }}
                                    </h6>
                                </div>
                                
                               
                            </div>
                            <div class="table-container">
    
                                <div class="table-responsive table-scroll">
                                    <br>
                                    <table class="table table-hover">
                                        <pre>{{$resultado}}</pre>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
          
        </div>
    </div>
    <script>
        function enviarFormulario_Info_mcud() {
            document.getElementById('miFormulario_Info_mcud').submit();
        }
    </script>
@endsection
