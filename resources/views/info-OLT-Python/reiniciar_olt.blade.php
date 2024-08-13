@extends('layouts.admin')
@section('contenido')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('info-olt.index', $olt->idolt) }}">{{ $olt->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reinicio OLT</li>
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


                    </ul>

                </div>
            </div>
            <div class="col-xl-9 col-md-9 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">

                            <div class="py-1">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Versión y tiempo activo del equipo: {{ $olt->nombre }}
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
    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Mostrar el spinner
            mostrarSpinner();
            // Redirigir a la ruta deseada
            window.location.href = "{{ route('reiniciar_olt.reiniciar_olt', $olts->idolt) }}";
        });
    
      
    </script>s
@endsection
