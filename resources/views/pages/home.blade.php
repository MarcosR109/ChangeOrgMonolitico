@extends('layouts.public')
@section('content')
    <!-- Main Section -->
    <style>
        .translucido {
            background-color: rgba(255, 220, 220, 0.767);

        }

        .badge-element:hover {
            background-color: #dc3545;
        }
    </style>
    <div class="container my-3 ">
        <div id="carouselExampleDark" class="carousel carousel-dark slide"
             data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://via.placeholder.com/500x300"
                         class="d-block w-100" alt="Hokusai">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://via.placeholder.com/500x300"
                         class="d-block w-100" alt="Fotón">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/500x300"
                         class="d-block w-100" alt="Fotón">
                </div>
                <!-- Caption added here to apply to all items -->
                <div
                    class="carousel-caption d-flex flex-column align-items-end justify-content-end h-100">
                    <div class="translucido p-2 rounded-3">
                        <h1 class="display-4">La plataforma mundial para el
                            cambio</h1>
                        <p class="lead">541,907,023 personas han pasado a la
                            acción. <a href="#"
                                       class="link-danger">Victorias cada
                                día</a>.</p>

                        <button class="btn btn-danger btn-lg">
                            <a class = "text-white underline-opacity-0" href="{{route('peticiones.create')}}">Inicia una
                                petición</a>
                        </button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"
                          aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon"
                          aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Petition Section -->
    <div class="container">
        <div class="row">
            <!-- Main Petition -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/500x300"
                         class="card-img-top" alt="Petición Principal">
                    <div class="card-body">
                        <h5 class="card-title">Soy Mayor, NO idiota.
                            Increíble lo que hemos logrado ¡Gracias!</h5>
                        <p
                            class="card-text">"Cuando inicié change.org/SoyMayorNOidiota muchas personas pensarían que
                            dónde iba un viejo como yo a pedir un cambio a los grandes bancos..."</p>
                        <a href="#" class="btn btn-outline-danger">Más</a>
                    </div>
                    <div class="card-footer text-muted">
                        <small>Carlos San Juan, España • 647,701
                            Firmantes</small>
                    </div>
                </div>
            </div>

            <!-- Other Petitions -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Petition Card -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/250x150"
                                 class="card-img-top"
                                 alt="Petición Secundaria">
                            <div class="card-body">
                                <h6 class="card-title">LO HEMOS
                                    CONSEGUIDO!!!</h6>
                                <p class="card-text">Empieza a funcionar la
                                    PRIMERA UNIDAD TCA EN ANDALUCÍA.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/250x150"
                                 class="card-img-top"
                                 alt="Petición Secundaria">
                            <div class="card-body">
                                <h6 class="card-title">España ya cuenta con
                                    un teléfono para prevenir los
                                    suicidios</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/250x150"
                                 class="card-img-top"
                                 alt="Petición Secundaria">
                            <div class="card-body">
                                <h6 class="card-title">La Ley de Infancia
                                    aumenta los tiempos de prescripción</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/250x150"
                                 class="card-img-top"
                                 alt="Petición Secundaria">
                            <div class="card-body">
                                <h6 class="card-title">Ruth consigue su
                                    tarjeta de aparcamiento</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h3 class="fw-bold">Mira lo que está pasando en Change.org</h3>
        <div class="row">
            <!-- Peticiones -->
            <div class="col-lg-10">
                <div class="card mb-3">
                    <div class="card-body">
                            <span class="badge bg-dark mb-2">Popular en
                                Salud</span>
                        <h5 class="card-title">Tu vida está en nuestras
                            manos y N O P O D E M O S M Á S: STOP GUARDIAS
                            MÉDICAS 24 HORAS</h5>
                        <p class="card-text">Llegas a urgencias. Estás muy
                            grave y te ingresan en la UCI. Un médico tiene
                            que tomar YA una decisión...</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40"
                                     class="rounded-circle me-2"
                                     alt="Tamara Contreras del Pino">
                                <small class="text-muted">Tamara Contreras
                                    del Pino</small>
                            </div>
                            <a href="#" class="text-danger">Saber más</a>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span class="text-muted">157,843 firmantes</span>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                            <span class="badge bg-dark mb-2">Popular en
                                Salud</span>
                        <h5 class="card-title">LOS NIÑOS TAMBIÉN SE VAN -
                            Garanticen un servicio de guardia en cuidados
                            paliativos 24/7</h5>
                        <p class="card-text">Los niños que son atendidos en
                            las unidades de cuidados paliativos pediátricos
                            presentan enfermedades...</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/40"
                                     class="rounded-circle me-2"
                                     alt="Padres de niños en Cuidados Paliativos Pediátricos">
                                <small class="text-muted">Padres de niños en
                                    Cuidados Paliativos Pediátricos</small>
                            </div>
                            <a href="#" class="text-danger">Saber más</a>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span class="text-muted">96,790 firmantes</span>
                    </div>
                </div>
            </div>
            <!-- Temas Destacados -->
            <div class="col-md-2">
                <h5 class="fw-bold">TEMAS DESTACADOS</h5>
                <div class="d-flex flex-wrap flex-column">
                        <span
                            class="badge bg-light text-dark border m-1 badge-element">Sanidad</span>
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
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
