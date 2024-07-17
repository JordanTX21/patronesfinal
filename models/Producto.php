<?php
// Modelo para productos

class Producto {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Métodos CRUD
    public function listarProductos() {
        $query = "SELECT * FROM productos";
        $resultado = $this->conexion->query($query);

    // Inicializar un array para almacenar los resultados
    $productos = array();
    
    // Recorrer el resultado y almacenar cada fila en el array
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }

    // Liberar memoria del resultado
    $resultado->free();

    // Retornar el array de productos
    return $productos;
    }
    public function obtenerProducto($codigo) {
        $query = "SELECT * FROM productos WHERE codigo=$codigo";
        $resultado = $this->conexion->query($query);

    // Inicializar un array para almacenar los resultados
    $productos = array();
    
    // Recorrer el resultado y almacenar cada fila en el array
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }

    // Liberar memoria del resultado
    $resultado->free();

    // Retornar el array de productos
    return count($productos)?$productos[0]:null;
    }

    public function agregarProducto($descripcion, $fecha, $precio, $stock) {
        $query = "INSERT INTO productos (descripcion, fecha, precio, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssdi", $descripcion, $fecha, $precio, $stock);
        return $stmt->execute();
    }

    public function editarProducto($codigo, $descripcion, $fecha, $precio, $stock) {
        $query = "UPDATE productos SET descripcion=?, fecha=?, precio=?, stock=? WHERE codigo=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssdii", $descripcion, $fecha, $precio, $stock, $codigo);
        return $stmt->execute();
    }

    public function eliminarProducto($codigo) {
        $query = "DELETE FROM productos WHERE codigo=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}
?>
