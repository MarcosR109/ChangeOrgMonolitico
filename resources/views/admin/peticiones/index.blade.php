@extends('layouts.admin')
@section('content')
    <div class="table-responsive">
        @if($errors->any())
            <div class="alert-danger p-3 m-2 rounded-2">
                <span>{{$errors->first()}}</span></div>
        @endif
        @if (session('error'))
            <div class="container alert alert-danger">{{session('error')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Destinatario</th>
                <th>Firmantes</th>
                <th>Estado</th>
                <th>ID de usuario</th>
                <th>Categoría</th>
            </tr>
            </thead>
            @forelse($content as $contenido)
                <tr>
                    <td>{{ $contenido->id }}</td>
                    <td>{{ $contenido->titulo }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($contenido->descripcion, 50, '...') }}</td>
                    <td>{{$contenido->destinatario}}</td>
                    <td>{{ $contenido->firmantes }}</td>
                    <td>{{$contenido->estado}}</td>
                    <td>{{ $contenido->user->id }}</td>
                    <td>{{ $contenido->categoria->nombre}}</td>
                    <td>@if($contenido->estado!="aceptada")
                            <form action="{{route('adminpeticiones.estado',$contenido->id)}}" method="post"
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">✓</button>
                            </form>
                        @endif
                        <a href="{{ route('adminpeticiones.edit', $contenido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('adminpeticiones.delete', $contenido->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar esta petición?')">Eliminar
                            </button>
                        </form>
                        <a href="{{route('adminpeticiones.show',$contenido->id)}}"
                           class="btn btn-success btn-sm">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay peticiones disponibles</td>
                </tr>
                @endforelse
                </tbody>
        </table>
        <a href="{{route('adminpeticiones.create')}}">Crear una nueva petición</a>
@endsection
