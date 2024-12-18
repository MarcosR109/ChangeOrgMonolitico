@extends('layouts.admin')
@section('content')

    @if (session('error'))
        <div class="container alert alert-danger">{{session('error')}}
        </div>
    @endif

    <div class="container my-5">
        <h3 class="fw-bold h3">Categoría</h3>
        <div class="container">
            <div class="row">
                <!-- Peticiones -->
                <div class="col-lg-10 col-sm-12">
                    <div class="card my-3">
                        <div class="card-body d-flex flex-column flex-sm-row position-relative">
                            <div class="d-flex flex-column w-100">
                                <h5 class="card-title">Nombre: {{ $content->nombre}}</h5>
                            </div>
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
