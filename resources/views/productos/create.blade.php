@extends('layouts.app')

@section('content')
    <h2>Nuevo Producto</h2>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        @include('productos._form')
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection