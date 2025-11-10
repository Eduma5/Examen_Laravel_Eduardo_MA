<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra todas las categorías
     */
    public function index()
    {
        // Obtener todas las categorías ordenadas por nombre
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        
        // Retornar la vista con las categorías
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario para crear una nueva categoría
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     * Almacena una nueva categoría en la base de datos
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'slug' => 'required|string|max:150|unique:categorias,slug',
            'estado' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con este nombre.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'slug.required' => 'El slug es obligatorio.',
            'slug.unique' => 'Ya existe una categoría con este slug.',
            'slug.max' => 'El slug no puede tener más de 150 caracteres.',
        ]);

        // Si no se envió el estado, establecerlo como true (activo)
        if (!isset($validated['estado'])) {
            $validated['estado'] = true;
        }

        // Crear la categoría
        $categoria = Categoria::create($validated);

        // Redireccionar con mensaje de éxito
        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     * Muestra los detalles de una categoría específica
     */
    public function show(Categoria $categoria)
    {
        // Retornar la vista con la categoría
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para editar una categoría
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     * Actualiza una categoría existente
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string',
            'slug' => 'required|string|max:150|unique:categorias,slug,' . $categoria->id,
            'estado' => 'nullable|boolean',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con este nombre.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'slug.required' => 'El slug es obligatorio.',
            'slug.unique' => 'Ya existe una categoría con este slug.',
            'slug.max' => 'El slug no puede tener más de 150 caracteres.',
        ]);

        // El checkbox de estado solo se envía si está marcado
        $validated['estado'] = $request->has('estado') ? true : false;

        // Actualizar la categoría
        $categoria->update($validated);

        // Redireccionar con mensaje de éxito
        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una categoría de la base de datos
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            
            return redirect()->route('categorias.index')
                ->with('success', 'Categoría eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')
                ->with('error', 'Error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}
