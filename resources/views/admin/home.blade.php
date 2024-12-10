@extends('layouts.admin')
@section('content')
        <div class="container my-5">
            <h3 class="fw-bold h3">Panel de Control - Administrador</h3>
            <div class="d-flex justify-content-between my-3">
                <h4 class="fw-bold">Listado de Peticiones</h4>
                <a href="{{ route('peticiones.create') }}" class="btn btn-success">Nueva Petición</a>
            </div>

            <!-- Tabla de peticiones -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Firmantes</th>
                        <th>Categoría</th>
                        <th>Creado por</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@forelse($content as $contenido)
                        <tr>
                            <td>{{ $contenido->id }}</td>
                            <td>{{ $contenido->titulo }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($contenido->descripcion, 50, '...') }}</td>
                            <td>{{ $contenido->firmantes }}</td>
                            <td>{{ $contenido->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td>{{ $contenido->user->name }}</td>
                            <td>
                                <a href="{{ route('peticiones.show', $contenido->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('peticiones.edit', $contenido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('peticiones.delete', $contenido->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta petición?')">Eliminar</button>
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
            </div>

            <!-- Paginación -->
            <div class="mt-4">
                {!! $content->links() !!}
            </div>
            --}}
        </div>
    @endsection

