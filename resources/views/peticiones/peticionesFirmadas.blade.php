
@extends('layouts.public')
@section('content')
    <div class="container my-5">
        <h3 class="fw-bold h3">Nuestras peticiones</h3>
        <span class="h4">Ordenar peticiones por categoría: </span>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                @foreach($content as $contenido)
                    <div class="col-lg-8 col-sm-12">
                        <div class="card my-3">
                            <div class="card-body d-flex flex-column flex-sm-row">
                                <img src="{{asset('/peticiones\/').$contenido->file->file_path}}" alt width="500px"
                                     height="300px"
                                     class="img-fluid col-12 col-sm-4 rounded-2 me-3 mb-3 mb-sm-0 rounded-3">
                                <div>
                                    <h5 class="card-title"><?= $contenido['titulo'] ?></h5>
                                    <p class="card-text"><?= $contenido['descripcion'] ?></p>
                                    <span class="text-muted text-gray w-50"><p><b>Únete a {{$contenido->firmantes}} personas que ya han firmado esta petición</b></p></span>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center mt-5">
                                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2"
                                                 alt="Tamara Contreras del Pino">
                                            <small class="text-muted"><?= $contenido->user->name ?></small>
                                            <a
                                                href="{{route('peticiones.show',$contenido->id)}}"
                                                class="text-primary mx-3">Saber más</a>
                                            @if($contenido->user_id==Auth::id())
                                                <form id="eliminarPeticion" action="{{ route('peticiones.delete', $contenido->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"  class="btn btn-danger" onclick="this.form.submit()">Eliminar</button>
                                                </form>
                                                <form id="editarPeticion" action="{{ route('peticiones.edit', $contenido->id)}}" method="get">
                                                    <button type="submit" class="btn btn-danger mx-2"
                                                            style="background-color: purple; border:1px solid purple">
                                                        Editar
                                                    </button>
                                                </form>

                                            @endif
                                            @if($errors->any())
                                                <div class="alert-danger p-3 m-2 rounded-2"><span>{{$errors->first()}}</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach   <!-- Repite el bloque de la card para más peticiones -->
            </div>
            @if($content->links())
                <div class="container m-3">
                    {!! $content->links() !!}
                </div>
            @endif

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
