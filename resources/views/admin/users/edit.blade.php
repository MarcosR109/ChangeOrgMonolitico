@extends('layouts.admin')
@section('content')
    <div class="container my-5">
        <h3 class="fw-bold h3">Modificar nombre de usuario</h3>
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-sm-12 mx-auto">
                    <div class="card my-3">
                        <div class="card-body">
                            <!-- Formulario -->
                            <form action="{{route('adminusers.update',$content->id)}}" method="post"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $content->id }}">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-bold">Nombre de usuario</label>
                                    <input type="text" name="nombre"
                                           class="form-control @error('nombre') is-invalid @enderror"
                                           placeholder="{{$content->name}}" id="validationserver01">
                                    @error('nombre')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger">Editar usuario</button>
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
