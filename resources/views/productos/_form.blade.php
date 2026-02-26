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