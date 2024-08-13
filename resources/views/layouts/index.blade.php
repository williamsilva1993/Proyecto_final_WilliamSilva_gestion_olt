@extends('layouts.admin')
@section('contenido')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Inicio /</li>
        </ol>
    </nav>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            @foreach ($olts as $olt )
            <div class="col-xl-2 col-md-6 mb-4">
                <a href="{{ route('info-olt.index',$olt->idolt) }}" class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $olt->nombre }}
                                </div>
                            </div>
                        </div>  
                    </div>
                </a>
            </div>               
            @endforeach
        </div>
    </div>
    
@endsection
