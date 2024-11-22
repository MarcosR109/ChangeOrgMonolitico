@extends('layouts.public')
@section('content')

    <div class="container my-5">
        <h3 class="fw-bold h3">Crear nueva petición</h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div class="card my-3">
                        <div class="card-body">
                            <!-- Formulario -->
                            <form action="{{ route('peticiones.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="titulo" class="form-label fw-bold">Título de la petición</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Escribe el título" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Describe la petición" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="destinatario" class="form-label fw-bold">Destinatarios</label>
                                    <input type="text" id="destinatario" name="destinatario" class="form-control" placeholder="Destinatarios" ">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label fw-bold">Categoría</label>
                                    <select type="select" id="categoria" name="categoria" class="form-control">
                                    @foreach($categorias as $cat)
                                        <option value={{$cat['id']}}>{{$cat['nombre']}}</option>
                                    @endforeach
                                    </select>
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
