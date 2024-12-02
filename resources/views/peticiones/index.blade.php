@extends('layouts.public')
@section('content')

    <div class="container my-5">
        <h3 class="fw-bold h3">Nuestras peticiones</h3>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                @foreach($content as $contenido)
                    <div class="col-lg-8 col-sm-12">
                        <div class="card my-3">
                            <div class="card-body d-flex flex-column flex-sm-row">
                                <img src="https://via.placeholder.com/500x300" alt
                                     class="img-fluid col-12 col-sm-4 rounded-2 me-3 mb-3 mb-sm-0">
                                <div>
                                    <h5 class="card-title"><?= $contenido['titulo'] ?></h5>
                                    <p class="card-text"><?= $contenido['descripcion'] ?></p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center mt-5">
                                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2"
                                                 alt="Tamara Contreras del Pino">
                                            <small class="text-muted"><?= $contenido->user->name ?></small>
                                            <a
                                                href="{{route('peticiones.show',$contenido->id)}}"
                                                class="text-primary mx-3">Saber más</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach   <!-- Repite el bloque de la card para más peticiones -->
            </div>


            <!-- Temas destacados -->
            <div class="col-lg-4 col-sm-12">
                <h4 class="fw-bold">Temas destacados</h4>
                <span
                    class="badge bg-light text-dark border m-1 ">Sanidad</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Animales</span>
                <span class="badge bg-light text-dark border m-1 ">Medio
                ambiente</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Educación</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Justicia
                económica</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Refugiados</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Lgtb</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Alimentación</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Feminismo</span>
                <span
                    class="badge bg-light text-dark border m-1 ">Mujeres
                en México</span>
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection
