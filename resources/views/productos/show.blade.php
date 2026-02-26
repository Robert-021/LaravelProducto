@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 500px">
        <div class="card-header">
            <h4>{{ $producto->nombre }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }} unidades</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion ?? 'Sin descripción' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">← Volver</a>
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
@endsection