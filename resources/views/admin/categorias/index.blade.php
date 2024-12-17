@extends('layouts.admin')
@section('content')
    <div class="table-responsive">
        @if($errors->any())
            <div class="alert-danger p-3 m-2 rounded-2">
                <span>{{$errors->first()}}</span></div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
            </tr>
            </thead>
            @forelse($content as $contenido)
                <tr>
                    <td>{{ $contenido->id }}</td>
                    <td>{{ $contenido->nombre }}</td>
                    <td>    <a href="{{ route('admincategorias.edit', $contenido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admincategorias.delete', $contenido->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar esta petición?')">Eliminar
                            </button>
                        </form>
                        <a href="{{route('admincategorias.show',$contenido->id)}}"
                           class="btn btn-success btn-sm">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay categorías disponibles</td>
                </tr>
                @endforelse
                </tbody>

        </table>
        <a class="link link-danger" href="{{route('admincategorias.create')}}">Crear una nueva categoría</a>
@endsection
