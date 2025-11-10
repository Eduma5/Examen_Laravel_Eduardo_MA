<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .error {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            margin-left: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .buttons {
            margin-top: 20px;
        }
        
        small {
            color: #666;
            font-size: 0.85em;
        }
        
        input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }
        
        .checkbox-label {
            display: flex;
            align-items: center;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría *</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    value="{{ old('nombre', $categoria->nombre) }}" 
                    required
                >
                {{-- Directiva @error para mostrar errores de validación --}}
                @error('nombre')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea 
                    id="descripcion" 
                    name="descripcion"
                >{{ old('descripcion', $categoria->descripcion) }}</textarea>
                @error('descripcion')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Url</label>
                <input 
                    type="text" 
                    id="slug" 
                    name="slug" 
                    value="{{ old('slug', $categoria->slug) }}" 
                    placeholder="ej: electronica-hogar"
                    required
                >
                @error('slug')
                    <div class="error">{{ $message }}</div>
                @enderror
                <small>Usa solo letras minúsculas, números y guiones</small>
            </div>

            <div class="form-group">
                <label class="checkbox-label">
                    <input 
                        type="checkbox" 
                        id="estado" 
                        name="estado" 
                        value="1"
                        {{ old('estado', $categoria->estado) ? 'checked' : '' }}
                    >
                    Categoría activa
                </label>
                @error('estado')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
