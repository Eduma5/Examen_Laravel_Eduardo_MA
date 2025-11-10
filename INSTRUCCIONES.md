# Sistema de Gestión de Categorías - Laravel

##  Resultados de Aprendizaje Cumplidos

-  **RA1b**: Instalación correcta de Laravel con Composer
-  **RA1c**: Uso de Artisan para generar recursos
-  **RA2b**: Uso de directivas Blade (@if, @foreach, etc.)
-  **RA2d**: Separación de lógica de presentación
-  **RA3b**: Establecimiento de claves y restricciones en BD
-  **RA3d**: Diseño de BD reflejado en Laravel
-  **RA4b**: Implementación de métodos REST (index, store, show)

---

##  Cómo Probar la Aplicación

### 1. Iniciar el Servidor de Desarrollo

```bash
php artisan serve
```

El servidor se iniciará en: `http://localhost:8000`

### 2. Acceder a las Rutas

| Ruta | URL | Descripción |
|------|-----|-------------|
| **Listar Categorías** | http://localhost:8000/categorias | Muestra todas las categorías |
| **Nueva Categoría** | http://localhost:8000/categorias/create | Formulario para crear categoría |
| **Ver Detalle** | http://localhost:8000/categorias/{id} | Detalle de una categoría específica |

### 3. Datos de Ejemplo

Ya se han creado 5 categorías de ejemplo:
- Electrónica
- Ropa
- Deportes
- Hogar
- Libros

---

##  Estructura del Proyecto

```
app/
├── Models/
│   └── Categoria.php                  # Modelo Eloquent
└── Http/
    └── Controllers/
        └── CategoriaController.php    # Controlador con métodos REST

database/
├── migrations/
│   └── 2025_11_10_113259_create_categorias_table.php  # Migración
└── seeders/
    └── CategoriaSeeder.php            # Datos de ejemplo

resources/
└── views/
    └── categorias/
        ├── index.blade.php            # Lista de categorías
        ├── create.blade.php           # Formulario de creación
        └── show.blade.php             # Detalle de categoría

routes/
└── web.php                            # Rutas de la aplicación
```

---

##  Base de Datos

### Tabla: `categorias`

| Campo | Tipo | Restricciones |
|-------|------|---------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT |
| nombre | VARCHAR(100) | NOT NULL, UNIQUE |
| descripcion | TEXT | NULL |
| created_at | TIMESTAMP | NULL |
| updated_at | TIMESTAMP | NULL |

### Comandos Útiles

```bash
# Ver rutas disponibles
php artisan route:list

# Revertir migración
php artisan migrate:rollback

# Refrescar base de datos y seeders
php artisan migrate:refresh --seed

# Ver estado de migraciones
php artisan migrate:status
```

---

##  Características Implementadas

###  Directivas Blade Utilizadas

- `@if / @else / @endif` - Renderizado condicional
- `@foreach / @endforeach` - Iteración sobre colecciones
- `@error / @enderror` - Mostrar errores de validación
- `@csrf` - Protección contra ataques CSRF
- `{{ }}` - Escape de datos (protección XSS)

###  Validaciones

- Nombre obligatorio y único
- Máximo 100 caracteres en nombre
- Descripción opcional
- Mensajes de error personalizados

###  Métodos REST Implementados

| Método | Función |
|--------|---------|
| `index()` | Lista todas las categorías ordenadas alfabéticamente |
| `create()` | Muestra formulario de creación |
| `store()` | Guarda nueva categoría con validación |
| `show()` | Muestra detalle de una categoría |

---

##  Documentación

Consulta el archivo `DOCUMENTACION_EXAMEN.md` para información detallada sobre:

- Comandos Artisan utilizados
- Diseño completo de la base de datos
- Separación lógica de la aplicación (MVC)
- Flujo de datos
- Directivas Blade
- Validaciones y seguridad

---

##  Pruebas Recomendadas

1. **Ver lista de categorías**: Visita `/categorias`
2. **Crear nueva categoría**: Clic en "Nueva Categoría"
3. **Validar restricción única**: Intenta crear una categoría con nombre duplicado
4. **Validar campo obligatorio**: Intenta enviar formulario vacío
5. **Ver detalle**: Clic en "Ver Detalles" de cualquier categoría

---

##  Autor

**Eduardo MA**  
Examen Laravel - Noviembre 2025

---

##  Notas Adicionales

- La aplicación sigue el patrón **MVC** de Laravel
- Se implementa **separación de responsabilidades**
- Las vistas están **limpias** sin lógica de negocio
- El controlador maneja toda la **lógica de negocio**
- El modelo gestiona el **acceso a datos**
- Incluye **protección CSRF** y **validación de datos**
