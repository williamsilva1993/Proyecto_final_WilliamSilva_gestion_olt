@extends('layouts.admin')
@section('contenido')
    @foreach ($puertos as $puerto)
    @endforeach
    @foreach ($tarjetas  as $tarjeta)

    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('olt.create') }}">Nueva OLT</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tarjeta.create', $puerto->idolt) }}">Registrar Tarjeta</a></li>
            <li class="breadcrumb-item"><a href="{{ route('puerto.create', $puerto->idtarjeta_olt) }}">Registrar Puerto</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Puerto</li>
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
                        Editar puertos de la tarjeta
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('editar-puerto.update', $puerto->idpuerto_olt) }}"
                            method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Nombre OLT:</label>
                                <input type="text" class="form-control" 
                                    value="{{ $puerto->nombre }}" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nombre tarjeta:</label>
                                <input type="text" class="form-control" 
                                    value="{{ $puerto->nombre_tarjeta }}" readonly>
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label">Nombre del puerto:</label>
                                <input type="text" class="form-control" name="nombre_puerto"
                                    value="{{ $puerto->nombre_puerto }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Número del puerto:</label>
                                <input type="number" class="form-control" name="numero_puerto"
                                    value="{{ $puerto->numero_puerto }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Vlan:</label>
                                <input type="number" class="form-control" name="vlan"
                                    value="{{ $puerto->vlan }}">
                            </div>

                            <div class="col-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-9 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">

                            <div class="py-1">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Listado de tarjetas
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
                                                <th>Nombre Tarjeta</th>
                                                <th>Nombre Puerto</th>
                                                <th>Número Puerto</th>
                                                <th>Vlan</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($puertos as $puerto)
                                                <tr>

                                                    <td>{{ $puerto->nombre_tarjeta }}</td>
                                                    <td>{{ $puerto->nombre_puerto }}</td>
                                                    <td>{{ $puerto->numero_puerto }}</td>
                                                    <td>{{ $puerto->vlan }}</td>

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
        @endsection
