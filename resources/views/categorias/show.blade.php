<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Categoría</title>
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
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .detail-group {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
        }
        
        .detail-label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: #333;
            font-size: 1.1em;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            margin-right: 10px;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .btn-edit {
            background-color: #ffc107;
            color: white;
        }
        
        .btn-edit:hover {
            background-color: #e0a800;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
            margin-right: 10px;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        .empty-description {
            color: #999;
            font-style: italic;
        }
        
        .actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle de Categoría</h1>

        <div class="detail-group">
            <span class="detail-label">ID:</span>
            <span class="detail-value">{{ $categoria->id }}</span>
        </div>

        <div class="detail-group">
            <span class="detail-label">Nombre:</span>
            <span class="detail-value">{{ $categoria->nombre }}</span>
        </div>

        <div class="detail-group">
            <span class="detail-label">Slug:</span>
            <span class="detail-value">{{ $categoria->slug }}</span>
        </div>

        <div class="detail-group">
            <span class="detail-label">Descripción:</span>
            <div class="detail-value">
                {{-- Directiva @if para verificar si hay descripción --}}
                @if ($categoria->descripcion)
                    {{ $categoria->descripcion }}
                @else
                    <span class="empty-description">No se ha proporcionado una descripción para esta categoría.</span>
                @endif
            </div>
        </div>

        <div class="detail-group">
            <span class="detail-label">Estado:</span>
            <span class="detail-value">
                {{-- Directiva @if para mostrar estado --}}
                @if ($categoria->estado)
                    <span style="color: green; font-weight: bold;">✓ Activo</span>
                @else
                    <span style="color: red; font-weight: bold;">✗ Inactivo</span>
                @endif
            </span>
        </div>

        <div class="detail-group">
            <span class="detail-label">Fecha de Creación:</span>
            <span class="detail-value">{{ $categoria->created_at->format('d/m/Y H:i:s') }}</span>
        </div>

        <div class="detail-group">
            <span class="detail-label">Última Actualización:</span>
            <span class="detail-value">{{ $categoria->updated_at->format('d/m/Y H:i:s') }}</span>
        </div>

        <div class="actions">
            <a href="{{ route('categorias.index') }}" class="btn btn-primary"> Volver al Listado</a>
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-edit">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>
