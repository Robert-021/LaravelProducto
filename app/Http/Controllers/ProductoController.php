<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Ordenamiento
        $orden = $request->input('ordenar_por', 'id_asc');
        switch ($orden) {
            case 'id_desc':
                $query->orderBy('id', 'desc');
                break;
            case 'nombre_asc':
                $query->orderBy('nombre', 'asc');
                break;
            case 'nombre_desc':
                $query->orderBy('nombre', 'desc');
                break;
            case 'precio_asc':
                $query->orderBy('precio', 'asc');
                break;
            case 'precio_desc':
                $query->orderBy('precio', 'desc');
                break;
            case 'id_asc':
            default:
                $query->orderBy('id', 'asc'); // Más antiguo primero
                break;
        }

        $productos = $query->paginate(10)->withQueryString();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|max:100',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|max:100',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }

    public function toggleEstado(Producto $producto)
    {
        $producto->estado = !$producto->estado;
        $producto->save();

        $mensaje = $producto->estado ? 'Activo' : 'Inactivo';

        return back()->with('success', "Estado del producto cambiado a $mensaje exitosamente.");
    }
}