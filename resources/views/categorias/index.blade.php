<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Categorías</title>
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
            max-width: 1000px;
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
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .btn:hover {
            background-color: #0056b3;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead {
            background-color: #007bff;
            color: white;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .btn-small {
            padding: 5px 10px;
            font-size: 0.9em;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
            display: inline-block;
        }
        
        .btn-small:hover {
            background-color: #218838;
        }
        
        .btn-edit {
            background-color: #ffc107;
        }
        
        .btn-edit:hover {
            background-color: #e0a800;
        }
        
        .btn-delete {
            background-color: #dc3545;
            border: none;
            cursor: pointer;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        
        .actions-cell {
            white-space: nowrap;
        }
        
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Categorías</h1>

        {{-- Directiva @if para mostrar mensaje de éxito --}}
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Directiva @if para mostrar mensaje de error --}}
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('categorias.create') }}" class="btn">Nueva Categoría</a>

        {{-- Directiva @if para verificar si hay categorías --}}
        @if ($categorias->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Url</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Directiva @foreach para iterar sobre las categorías --}}
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->slug }}</td>
                            <td>
                                {{-- Directiva @if para mostrar descripción o mensaje alternativo --}}
                                @if ($categoria->descripcion)
                                    {{ Str::limit($categoria->descripcion, 50) }}
                                @else
                                    <em>Sin descripción</em>
                                @endif
                            </td>
                            <td>
                                {{-- Directiva @if para mostrar estado --}}
                                @if ($categoria->estado)
                                    <span style="color: green; font-weight: bold;">Activo</span>
                                @else
                                    <span style="color: red;">Inactivo</span>
                                @endif
                            </td>
                            <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                            <td class="actions-cell">
                                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn-small" title="Ver detalles">
                                     Ver
                                </a>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn-small btn-edit" title="Editar">
                                     Editar
                                </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-small btn-delete" title="Eliminar">
                                         Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            {{-- Mensaje cuando no hay categorías --}}
            <div class="empty-message">
                <p>No hay categorías registradas en el sistema.</p>
                <p>Haz clic en "Nueva Categoría" para agregar una.</p>
            </div>
        @endif
    </div>
</body>
</html>
