@extends('layouts.admin')
@section('contenido')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL('/principal') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo Usuario</li>
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
                    Registrar Nuevo Usuario
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('seguridad.store') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label">Nombre de usuario:</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">correo electronico:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Contraseña:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Confirmar contraseña:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Confirmar contraseña2:</label>
                            <input id="passwordPreview" type="text" class="form-control" name="pasword" readonly>
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
                                Listado de Usuarios
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
                                            <th>Nombre de usuario</th>
                                            <th>Correo electrónico</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($usuarios as $usuario)

                                        <tr>

                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td style="text-align: center">

                                            <a class=" collapsed"
                                                                href="{{ route('seguridad.edit', $usuario->id) }}"
                                                                aria-expanded="true" aria-controls="collapseTwo"
                                                                title="Editar usuario">
                                                                <i class="fa fa-edit"></i>

                                                            </a>

                                                </a>
                                                <a class=" collapsed" href="#" aria-expanded="true"
                                                aria-controls="collapseTwo" title="Eliminar Usuario"
                                                data-toggle="modal"
                                                data-target="#modal-delete-{{ $usuario->id }}">

                                                <i class="fa fa-trash "></i>

                                            </a>

                                            </td>

                                        </tr>

                                        @include('seguridad.delete')

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            // Selecciona el campo de entrada de la contraseña y el campo donde se reflejará
const passwordField = document.getElementById('password');
const passwordPreviewField = document.getElementById('passwordPreview');

// Añade un evento para cuando se escribe o borra en el campo de la contraseña
passwordField.addEventListener('input', function() {
    // Actualiza el valor del campo reflejado
    passwordPreviewField.value = passwordField.value;
});
        </script>
        @endsection