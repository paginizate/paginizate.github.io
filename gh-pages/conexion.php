<?php
$host = "127.0.0.1"; // Dirección del servidor de base de datos
$user = "root"; // Usuario de la base de datos
$password = ""; // Contraseña del usuario de la base de datos
$database = "2fase"; // Nombre de la base de datos

// Establecer la conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
