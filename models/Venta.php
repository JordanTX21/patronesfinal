<?php

class Venta {

    private $conexion;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para obtener todas las ventas
    public function obtenerVentas() {
        $query = "SELECT * FROM ventas"; // Query para seleccionar todas las ventas (ajusta según tu estructura de base de datos)
        $resultados = $this->conexion->query($query);

        if (!$resultados) {
            die('Error en la consulta: ' . $this->conexion->error);
        }

        $ventas = array();
        while ($venta = $resultados->fetch_assoc()) {
            $ventas[] = $venta;
        }

        $resultados->free();
        return $ventas;
    }

    // Otros métodos relacionados con ventas podrían incluirse aquí, como agregar una nueva venta, actualizar, eliminar, etc.
}

?>
