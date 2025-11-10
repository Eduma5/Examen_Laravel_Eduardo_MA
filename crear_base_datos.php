<?php

/**
 * Script para crear la base de datos 'catalogo'
 * Ejecutar con: php crear_base_datos.php
 */

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'catalogo';

try {
    // Conectar a MySQL sin especificar base de datos
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear la base de datos si no existe
    $sql = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sql);
    
    echo "✓ Base de datos '$database' creada exitosamente (o ya existía)\n";
    echo "\nAhora ejecuta: php artisan migrate --seed\n";
    
} catch (PDOException $e) {
    echo "✗ Error al crear la base de datos: " . $e->getMessage() . "\n";
    echo "\nAsegúrate de que:\n";
    echo "1. MySQL está ejecutándose\n";
    echo "2. Las credenciales en .env son correctas\n";
    echo "3. El usuario tiene permisos para crear bases de datos\n";
    exit(1);
}
