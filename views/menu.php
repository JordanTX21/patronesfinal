<!-- Vista para el menú principal -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <!-- <link href="assets/css/tailwind.css" rel="stylesheet"> -->
    <script src="assets/js/tailwind.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 grid-cols-12">
        <div class="col-span-2 px-4">
        <h1 class="text-3xl font-bold mb-4 ">Menú</h1>
        <ul class="space-y-2">
            <li><a href="index.php?action=listar_productos" class="text-blue-500 hover:underline">Listar Productos</a></li>
            <li><a href="index.php?action=agregar_producto" class="text-blue-500 hover:underline">Agregar Producto</a></li>
            <li><a href="index.php?action=docs" class="text-blue-500 hover:underline">Documentacion</a></li>
            <li><a href="index.php?action=reporte_ventas" class="text-blue-500 hover:underline">Reporte de Ventas</a></li>
        </ul>
        </div>
    </div>
</body>
</html>
