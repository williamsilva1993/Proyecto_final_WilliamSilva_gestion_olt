@extends('layouts.admin')
@section('contenido')
    @foreach ($olt as $olts)
    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('info-olt.index', $olts->idolt) }}">{{ $olts->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Disponibilidad</li>
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

                        <a onclick= "mostrarSpinner();" href="javascript:location.reload();" >
                            <li class="list-group-item"><i class="fa fa-clock     text-color-icono  mr-2"></i> Disponibilidad
                            </li>
                        </a>
                        </a>


                    </ul>

                </div>
            </div>
            <div class="col-xl-9 mb-4 full-height">
                <div class="card border-left-success shadow h-100 py-2">
              
                       <br>
                            <h4 class="mb-4">&nbsp;&nbsp;Tiempo de Actividad  {{ $olts->nombre }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <img id="prtgGraph1" class="img-fluid" src="http://192.168.10.115/chart.png?type=graph&id={{ $olts->disponibilidad }}&username=prtgadmin&passhash=1743683768&width=400&height=300" alt="Gráfico de PRTG 1">
                                </div>
                                <div class="col-md-6">
                                    <img id="prtgGraph2" class="img-fluid" src="http://192.168.10.115/chart.png?type=graph&id={{ $olts->ping_dos_dias }}&username=prtgadmin&passhash=1743683768&width=430&height=300&graphid=1" alt="Gráfico de PRTG 2">
                                </div>
                            </div>
                     
                        <script>
                            setInterval(function() {
                                document.getElementById('prtgGraph1').src = 'http://192.168.10.115/chart.png?type=graph&id={{ $olts->disponibilidad }}&username=prtgadmin&passhash=1743683768&width=400&height=300&timestamp=' + new Date().getTime();
                                document.getElementById('prtgGraph2').src = 'http://192.168.10.115/chart.png?type=graph&id={{ $olts->ping_dos_dias }}&username=prtgadmin&passhash=1743683768&width=430&height=300&graphid=1&timestamp=' + new Date().getTime();
                            }, 30000); // Actualiza cada 30 segundos
                        </script>
                        
                       

                </div>
            </div>

        </div>
    </div>
 

@endsection
