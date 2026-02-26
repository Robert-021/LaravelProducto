@extends('layouts.app')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        @include('productos._form')
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection