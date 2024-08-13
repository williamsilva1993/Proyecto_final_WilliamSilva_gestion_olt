@extends('layouts.admin')
@section('contenido')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('olt.create') }}">Nueva OLT</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gráficos OLT</li>
        </ol>
    </nav>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- <div class="container-fluid"> -->
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-4">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-header" style="background: #12bbad; color: #fff;">
                        Editar equipo:  {{ $olt->nombre }}
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('graficos.update', $olt->idolt) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="form-label">Nombre de la OLT:</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $olt->nombre }}" readonly>
                            </div>

                            <div class="col-12" style="display: none;">
                                <label class="form-label">Marca:</label>
                                <input type="text" class="form-control" name="marca" value="{{ $olt->marca }}" >
                            </div>
                            <div class="col-12"  style="display: none;">
                                <label class="form-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo" value="{{ $olt->modelo }}">
                            </div>
                            <div class="col-12"  style="display: none;">
                                <label class="form-label">Ip de conexión:</label>
                                <input type="text" class="form-control" name="ipconexion" value="{{ $olt->ipconexion }}">
                            </div>
                            <div class="col-md-6" style="display: none;>
                                <label class="form-label">puerto:</label>
                                <input type="text" class="form-control" name="puerto" value="{{ $olt->puerto }}">
                            </div>
                            <div class="col-md-6" style="display: none;>
                                <label class="form-label">numero de slot:</label>
                                <input type="text" class="form-control" name="numero_slot"
                                    value="{{ $olt->numero_slot }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Id Tráfico:</label>
                                <input type="text" class="form-control" name="trafico" value="{{ $olt->trafico }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Id Disponibilidad:</label>
                                <input type="text" class="form-control" name="disponibilidad"
                                    value="{{ $olt->disponibilidad }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Id Ping:</label>
                                <input type="text" class="form-control" name="ping_dos_dias" value="{{ $olt->ping_dos_dias }}">
                            </div>
                 

                            <div class="col-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
            <div class="col-xl-8 mb-4 full-height">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">

                            <div class="py-1">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Listado de OLTS
                                </h6>
                            </div>
                            <div class="table-container">

                                <div class="table-responsive table-scroll">
                                @if (session('success'))
                                        <div id="successMessage" class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre OLT</th>
                                                <th>Id tráfico</th>
                                                <th>Id Disponibilidad</th>
                                                <th>Id Ping</th>
                                               
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($olts as $olt)
                                            @if ($olt->estado=="Activo")
                                                <tr>
                                                    <td>{{ $olt->nombre }}</td>
                                                    <td>{{ $olt->trafico }}</td>
                                                    <td>{{ $olt->disponibilidad }}</td>
                                                    <td>{{ $olt->ping_dos_dias }}</td>
                                                  
                                                 
                                                </tr>
                                                @endif
                                                @include('olt.delete')
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

        <!-- Content Row -->


        <!-- </div> -->

    </div>

@endsection
