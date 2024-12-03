@extends('layouts.public')
@section('content')

    <div class="container my-5">
        <h3 class="fw-bold h3">Crear nueva petición</h3>
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div class="card my-3">
                        <div class="card-body">
                            <!-- Formulario -->
                            <form action="{{ route('peticiones.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="titulo" class="form-label fw-bold">Título de la petición</label>
                                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                           placeholder="Escribe el título" required  id="validationserver01">
                                    @error('titulo')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="4"
                                              placeholder="Describe la petición" required ></textarea>
                                    @error('descripcion')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="destinatario" class="form-label fw-bold">Destinatarios</label>
                                    <input type="text" id="destinatario" name="destinatario" class="form-control @error('destinatario') is-invalid @enderror"
                                           placeholder="Destinatarios" >
                                    @error('destinatario')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label fw-bold">Categoría</label>
                                    <select type="select" id="categoria" name="categoria" class="form-control">
                                        @foreach($categorias as $cat)
                                            <option value={{$cat['id']}}>{{$cat['nombre']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label fw-bold">Fotografía</label>
                                    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" placeholder="Foto" aria-required="true" >
                                    @error('foto')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Crear petición</button>
                                </div>
                            </form>
                            <!-- Fin formulario -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
