@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">+ Nuevo Producto</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('productos.index') }}" method="GET" class="row gx-3 gy-2 align-items-center">
                <div class="col-auto">
                    <label class="visually-hidden" for="estado">Filtrar por Estado</label>
                    <select class="form-select" id="estado" name="estado">
                        <option value="">Todos los Estados</option>
                        <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>Activos</option>
                        <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>Inactivos</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                    @if(request()->filled('estado'))
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        @if($producto->estado)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('¿Eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $productos->links() }}
@endsection