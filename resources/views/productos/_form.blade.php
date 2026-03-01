@foreach(['nombre', 'descripcion', 'precio', 'stock', 'categoria'] as $campo)
    <div class="mb-3">
        <label class="form-label text-capitalize">{{ $campo }}</label>

        @if($campo === 'descripcion')
            <textarea name="{{ $campo }}" class="form-control @error($campo) is-invalid @enderror"
                rows="3">{{ old($campo, $producto->$campo ?? '') }}</textarea>
        @else
            <input type="{{ in_array($campo, ['precio', 'stock']) ? 'number' : 'text' }}" name="{{ $campo }}"
                value="{{ old($campo, $producto->$campo ?? '') }}" class="form-control @error($campo) is-invalid @enderror"
                step="{{ $campo === 'precio' ? '0.01' : '1' }}">
        @endif

        @error($campo)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
        <option value="1" {{ old('estado', $producto->estado ?? 1) == 1 ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ old('estado', $producto->estado ?? 1) == 0 ? 'selected' : '' }}>Inactivo</option>
    </select>
    @error('estado')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>