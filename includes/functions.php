<?php
// Archivo con funciones útiles y lógica de la aplicación

// Función para conectar a la base de datos
function conectarDB() {
    $conexion = new mysqli('localhost', 'root', '123', 'final');
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    return $conexion;
}

// Función para obtener datos para los gráficos de barras y pie
function obtenerDatosGraficos() {
    // Lógica para obtener datos desde la base de datos y prepararlos para los gráficos
}

// Más funciones según necesidad...
?>
