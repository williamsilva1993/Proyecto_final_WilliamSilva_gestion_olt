@extends('layouts.admin')
@section('contenido')
@foreach ($tarjetas  as $tarjeta)

@endforeach

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('/') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('olt.create') }}">Nueva OLT</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tarjeta.create', $tarjeta->idolt) }}">Registrar Tarjeta</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar Puerto</li>
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
                        Registrar puerto en la OLT
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('guardar-puerto.store') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Nombre Olt:</label>
                                <input type="text" class="form-control" value="{{ $tarjeta->nombre }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Nombre de la tarjeta:</label>
                                <select class="form-control" name="idtarjeta_olt" readonly>
                                   
                                        <option selected value="{{ $tarjeta->idtarjeta_olt }}">{{ $tarjeta->nombre_tarjeta }}</option>
                                    
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nombre del puerto:</label>
                                <input type="text" class="form-control" name="nombre_puerto">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Número de puerto:</label>
                                <input type="number" class="form-control" name="numero_puerto">
                            </div>
                            <div class="col-12">
                                <label class="form-label">vlan:</label>
                                <input type="number" class="form-control" name="vlan">
                            </div>

                            <div class="col-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
                                    Listado de puertos
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
                                                <th>Numero de Puerto</th>
                                                <th>Vlan</th>
                                                <th style="text-align: center">Opciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($puertos as $puerto)
                                                <tr>

                                                    <td>{{ $puerto->nombre_tarjeta }}</td>
                                                    <td>{{ $puerto->nombre_puerto }}</td>
                                                    <td>{{ $puerto->numero_puerto }}</td>
                                                    <td>{{ $puerto->vlan }}</td>
                                                    <td style="text-align: center">

                                                        <a class=" collapsed"
                                                            href="{{ route('edit-puerto.edit', $puerto->idpuerto_olt) }}"
                                                            aria-expanded="true" aria-controls="collapseTwo"
                                                            title="Editar Puerto">
                                                            <i class="fas fa-edit fa-cog"></i>

                                                        </a>
                                                        <a class=" collapsed" href="#" aria-expanded="true"
                                                        aria-controls="collapseTwo" title="Eliminar Puerto"
                                                        data-toggle="modal"
                                                        data-target="#modal-delete-{{ $puerto->idpuerto_olt }}">
    
                                                        <i class="fas fa-trash  fa-cog"></i>
    
                                                    </a>


                                                      

                                                    </td>

                                                </tr>
                                             @include('puerto.delete')
                                            
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
