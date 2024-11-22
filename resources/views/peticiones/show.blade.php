@extends('layouts.public')
@section('content')

    <div class="container my-5">
        <h3 class="fw-bold h3">Nuestras peticiones</h3>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                    <div class="col-lg-10 col-sm-12">
                        <div class="card my-3">
                            <div class="card-body d-flex flex-column flex-sm-row">
                                <img src="https://via.placeholder.com/500x300" alt
                                     class="img-fluid col-12 col-sm-4 rounded-2 me-3 mb-3 mb-sm-0">
                                <div>

                                    <h5 class="card-title"><?= $content->titulo ?></h5>
                                    <p class="card-text"><?= $content->descripcion ?></p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center mt-5">
                                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2"
                                                 alt="Tamara Contreras del Pino">
                                            <small class="text-muted"><?= $content->user->name ?></small>
                                        </div>
                                        <a href="#" class="text-primary">Saber más</a>
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
