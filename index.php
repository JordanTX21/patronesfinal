<?php
// Controlador principal que maneja las rutas y acciones principales

// Incluir archivos necesarios
require_once 'includes/functions.php';

// Determinar la acción según el parámetro GET
$action = isset($_GET['action']) ? $_GET['action'] : 'menu';

// Según la acción solicitada, incluir la vista correspondiente
switch ($action) {
    case 'docs':
        include 'views/docs.php';
        break;
    case 'menu':
        include 'views/menu.php';
        break;
    case 'listar_productos':
        include 'views/productos/listar.php';
        break;
    case 'agregar_producto':
        include 'views/productos/agregar.php';
        break;
    case 'editar_producto':
        include 'views/productos/agregar.php';
        break;
    case 'eliminar_producto':
        include 'views/productos/listar.php';
        break;
    case 'reporte_ventas':
        include 'views/ventas/reporte.php';
        break;
    default:
        include 'views/menu.php';
        break;
}
?>
