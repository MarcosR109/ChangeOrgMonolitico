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
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @forelse($content as $contenido)
                @if($contenido->role_id!=2)
                <tr>
                    <td>{{ $contenido->id }}</td>
                    <td>{{ $contenido->name }}</td>
                    <td>{{ $contenido->email}}</td>
                    <td>
                        <form action="{{ route('adminusers.delete', $contenido->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar
                            </button>
                        </form>
                        <a href="{{route('adminusers.show',$contenido->id)}}"  class="btn btn-success btn-sm">Ver</a>
                    </td>
                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay usuarios disponibles</td>
                </tr>
            @endforelse
            </tbody>
        </table>
@endsection
