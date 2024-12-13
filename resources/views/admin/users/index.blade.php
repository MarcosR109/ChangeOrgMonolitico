@extends('layouts.admin')
@section('content')
    <div class="table-responsive">
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
                <tr>
                    <td>{{ $contenido->id }}</td>
                    <td>{{ $contenido->name }}</td>
                    <td>{{ $contenido->email}}</td>
                    <td>
                        <form action="{{ route('adminpeticiones.delete', $contenido->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar esta petición?')">Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay peticiones disponibles</td>
                </tr>
            @endforelse
            </tbody>
        </table>
@endsection
