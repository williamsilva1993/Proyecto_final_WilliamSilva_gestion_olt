@extends('layouts.admin')
@section('contenido')
    @foreach ($tarjetas as $tarjeta)
    @endforeach
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('olt.create') }}">Nueva OLT</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tarjeta.create', $tarjeta->idolt) }}">Registrar Tarjeta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Tarjeta</li>
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
                        Editar tarjeta de la OLT
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('editar-tarjeta.update', $tarjeta->idtarjeta_olt) }}"
                            method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Nombre OLT:</label>
                                <input type="text" class="form-control"
                                    value="{{ $tarjeta->nombreolt }}" readonly>
                            </div>

                            
                            <div class="col-12">
                                <label class="form-label">Nombre tarjeta:</label>
                                <input type="text" class="form-control" name="nombre_tarjeta"
                                    value="{{ $tarjeta->nombre_tarjeta }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Número de tarjeta:</label>
                                <input type="number" class="form-control" name="numero_slot"
                                    value="{{ $tarjeta->numero_slot }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Puertos de la tarjeta:</label>
                                <input type="number" class="form-control" name="cantidad_puerto"
                                    value="{{ $tarjeta->cantidad_puerto }}">
                            </div>

                            <div class="col-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
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
                                                <th>Nombre OLT</th>
                                                <th>Nombre Tarjeta</th>
                                                <th>Tarjeta</th>
                                                <th>Puertos</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($tarjetas as $tarjeta)
                                                <tr>

                                                    <td>{{ $tarjeta->nombreolt }}</td>
                                                    <td>{{ $tarjeta->nombre_tarjeta }}</td>
                                                    <td>{{ $tarjeta->numero_slot }}</td>
                                                    <td>{{ $tarjeta->cantidad_puerto }}</td>

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
