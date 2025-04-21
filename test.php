<?php
require_once __DIR__ . '/vendor/autoload.php';

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Infrastructure\Database\DatabaseConnection;

try {
    $db = DatabaseConnection::getConnection();
    echo "Conexió correcta!";
} catch (Exception $e) {
    echo "Error de connexió: " . $e->getMessage();
}