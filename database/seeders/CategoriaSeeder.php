<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Electrónica',
                'descripcion' => 'Productos electrónicos, computadoras, smartphones y accesorios tecnológicos',
                'slug' => 'electronica',
                'estado' => true,
            ],
            [
                'nombre' => 'Ropa',
                'descripcion' => 'Prendas de vestir para hombre, mujer y niños',
                'slug' => 'ropa',
                'estado' => true,
            ],
            [
                'nombre' => 'Deportes',
                'descripcion' => 'Artículos deportivos, equipamiento y ropa deportiva',
                'slug' => 'deportes',
                'estado' => true,
            ],
            [
                'nombre' => 'Hogar',
                'descripcion' => 'Muebles, decoración y artículos para el hogar',
                'slug' => 'hogar',
                'estado' => true,
            ],
            [
                'nombre' => 'Libros',
                'descripcion' => 'Libros físicos y digitales de diferentes géneros',
                'slug' => 'libros',
                'estado' => false, // Esta categoría está inactiva como ejemplo
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
