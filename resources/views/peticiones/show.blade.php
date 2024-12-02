@extends('layouts.public')
@section('content')
@use ("Illuminate\Support\Facades\Auth")

    <div class="container my-5">
        <h3 class="fw-bold h3">Nuestras peticiones</h3>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                <div class="col-lg-10 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body d-flex flex-column flex-sm-row position-relative">
                            <img src="https://via.placeholder.com/500x300" alt
                                 class="img-fluid col-12 col-sm-4 rounded-2 me-3 mb-3 mb-sm-0">
                            <div class="d-flex flex-column w-100">
                                <h5 class="card-title"><?= $content->titulo ?></h5>
                                <p class="card-text"><?= $content->descripcion ?></p>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2">
                                    <small class="text-muted"><?= $content->user->name ?></small>
                                </div>
                            </div>
                            <!-- Botón en la esquina inferior derecha -->
                            <form method="POST" action="{{route('peticiones.firmar',$content)}}" enctype="multipart/form-data"
                                  class="position-absolute bottom-0 end-0 m-3">
                                @csrf
                                <button class="btn btn-danger">Firmar</button>
                            </form>
                        </div>
                    </div>
                    <!-- Repite el bloque de la card para más peticiones -->
                    </div>
            </div>
        </div>
    </div>
@endsection
