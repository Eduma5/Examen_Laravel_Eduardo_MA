<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'categorias';

    /**
     * Los atributos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'slug',
        'estado',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'estado' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
