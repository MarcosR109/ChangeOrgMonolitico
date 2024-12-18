@extends('layouts.admin')
@section('content')

    <div class="container my-5">
        <h3 class="fw-bold h3">Crear nueva petición</h3>
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger p-3 m-2 rounded-2"><span>{{$errors->first()}}</span></div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div class="card my-3">
                        <div class="card-body">
                            <!-- Formulario -->
                            <form action="{{ route('admincategorias.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="titulo" class="form-label fw-bold">Nueva categoría</label>
                                    <input type="text" name="nombre"
                                           class="form-control @error('nombre') is-invalid @enderror"
                                           placeholder="Escribe el título" id="validationserver01">
                                    @error('nombre')
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
