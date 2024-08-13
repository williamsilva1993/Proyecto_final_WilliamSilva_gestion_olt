@extends('layouts.admin')
@section('contenido')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('info-olt.index', $olt->idolt) }}">{{ $olt->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Conexión SSh</li>
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

                        <a href="{{ route('probar_conexion_ssh.probar_conexion_ssh',$olt->idolt) }}" onclick="mostrarSpinner();">
                            <li class="list-group-item"><i class="fa fa-clock text-color-icono  mr-2"></i> Conexión SSh</li>
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
                                   Conexión a la OLT por SSH: {{ $olt->nombre }}
                                </h6>
                            </div>


                        </div>
                        <div class="table-container">

                            <div class="table-responsive table-scroll">
                                <br>
                                <table class="table table-hover">
                                    <pre>{{ $resultado }}</pre>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
