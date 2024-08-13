@extends('layouts.admin')
@section('contenido')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nueva OLT</li>
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
                        Registrar Nueva OLT
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('olt.store') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Nombre de la OLT:</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Marca:</label>
                                <input type="text" class="form-control" name="marca">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Ip de conexión:</label>
                                <input type="text" class="form-control" name="ipconexion">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Puerto conexión:</label>
                                <input type="text" class="form-control" name="puerto">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total tarjetas:</label>
                                <input type="text" class="form-control" name="numero_slot">
                            </div>

                            <div class="col-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
                                                <th>Modelo</th>
                                                <th>Ip</th>
                                                <th>Puerto</th>
                                                <th>Tarjeta</th>
                                                <th style="text-align: center">Opciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($olts as $olt)
                                                @if ($olt->estado == 'Activo')
                                                    <tr>

                                                        <td>{{ $olt->nombre }}</td>
                                                        <td>{{ $olt->modelo }}</td>
                                                        <td>{{ $olt->ipconexion }}</td>
                                                        <td>{{ $olt->puerto }}</td>
                                                        <td>{{ $olt->numero_slot }}</td>
                                                        <td style="text-align: center">

                                                            


                                                            <a class=" collapsed"
                                                                href="{{ route('tarjeta.create', $olt->idolt) }}"
                                                                data-target="#collapseTwo" aria-expanded="true"
                                                                aria-controls="collapseTwo" title="Agregar Tarjeta">
                                                                <i class="fa fa-share-square "></i>

                                                            </a>
                                                            |
                                                            <a class=" collapsed"
                                                                href="{{ route('olt.edit', $olt->idolt) }}"
                                                                aria-expanded="true" aria-controls="collapseTwo"
                                                                title="Editar OLT">
                                                                <i class="fa fa-edit"></i>

                                                            </a>
                                                            <a class=" collapsed"
                                                            href="{{ route('graficos.edit', $olt->idolt) }}"
                                                            aria-expanded="true" aria-controls="collapseTwo"
                                                            title="Agregar Gráficos">
                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>

                                                        </a>


                                                            <a class=" collapsed" href="#" aria-expanded="true"
                                                                aria-controls="collapseTwo" title="Eliminar OLT"
                                                                data-toggle="modal"
                                                                data-target="#modal-delete-{{ $olt->idolt }}">

                                                                <i class="fa fa-trash "></i>

                                                            </a>

                                                        </td>

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
        @endsection
