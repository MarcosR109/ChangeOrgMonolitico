@extends('layouts.admin')
@section('content')
    @use ("Illuminate\Support\Facades\Auth")

    @if (session('error'))
        <div class="container alert alert-danger">{{session('error')}}
        </div>
    @endif

    <div class="container my-5">
        <h3 class="fw-bold h3">Nuestras peticiones</h3>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                <div class="col-lg-10 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body d-flex flex-column flex-sm-row position-relative">
                            <img src="{{asset('/peticiones\/').$content->file->file_path}}" alt width="500px"
                                 height="300px"
                                 class="img-fluid col-12 col-sm-4 rounded-2 me-3 mb-3 mb-sm-0">
                            <div class="d-flex flex-column w-100">

                                <h5 class="card-title">{{ $content->titulo }}</h5>
                                <p class="card-text">{{ $content->descripcion }}</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2">
                                    <small class="text-muted">{{$content->user->name }}</small>
                                </div>
                                <span class="text-muted text-gray w-50"><p><b>Firmantes: {{$content->firmantes}}</b></p></span>
                                @if($errors->any())
                                    <div class="alert-danger p-3 m-2 rounded-2"><span>{{$errors->first()}}</span></div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Repite el bloque de la card para más peticiones -->
            </div>
        </div>
    </div>
    </div>
@endsection
