<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Categoria;

echo "\n========================================\n";
echo "   BASE DE DATOS: CATALOGO\n";
echo "   TABLA: categorias\n";
echo "========================================\n\n";

$total = Categoria::count();
echo "Total de categorías: $total\n\n";

if ($total > 0) {
    echo "Listado de categorías:\n";
    echo str_repeat("-", 80) . "\n";
    printf("%-5s %-20s %-25s %-10s %-15s\n", "ID", "Nombre", "Slug", "Estado", "Fecha Creación");
    echo str_repeat("-", 80) . "\n";
    
    Categoria::orderBy('id')->get()->each(function($categoria) {
        printf(
            "%-5s %-20s %-25s %-10s %-15s\n",
            $categoria->id,
            $categoria->nombre,
            $categoria->slug,
            $categoria->estado ? '✓ Activo' : '✗ Inactivo',
            $categoria->created_at->format('d/m/Y H:i')
        );
    });
    
    echo str_repeat("-", 80) . "\n\n";
    
    echo "Estructura de la tabla 'categorias':\n";
    echo str_repeat("-", 80) . "\n";
    echo "• id (BIGINT) - PRIMARY KEY, AUTO_INCREMENT\n";
    echo "• nombre (VARCHAR 100) - NOT NULL, UNIQUE\n";
    echo "• descripcion (TEXT) - NULL\n";
    echo "• slug (VARCHAR 150) - UNIQUE\n";
    echo "• estado (BOOLEAN) - DEFAULT TRUE\n";
    echo "• created_at (TIMESTAMP)\n";
    echo "• updated_at (TIMESTAMP)\n";
    echo str_repeat("-", 80) . "\n\n";
    
    echo "✓ La base de datos 'catalogo' está funcionando correctamente!\n\n";
} else {
    echo "⚠ No hay categorías en la base de datos.\n";
    echo "Ejecuta: php artisan db:seed --class=CategoriaSeeder\n\n";
}
