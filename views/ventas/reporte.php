<?php
require_once 'models/Venta.php';

$db = conectarDB();

$ventaModel = new Venta($db);
// Suponiendo que tienes una función en tu modelo que obtiene los datos de las ventas
$ventas = $ventaModel->obtenerVentas();

// Array para almacenar la cantidad de productos vendidos por producto
$productosVendidos = array();

// Procesar las ventas para contar la cantidad de productos vendidos por cada producto
foreach ($ventas as $venta) {
    $producto = $venta['descripcion_producto']; // Suponiendo que 'descripcion' es el nombre del producto
    if (isset($productosVendidos[$producto])) {
        $productosVendidos[$producto]++;
    } else {
        $productosVendidos[$producto] = 1;
    }
}

// Datos para el gráfico de barras
$dataBarras = array(
    'labels' => array_keys($productosVendidos),
    'data' => array_values($productosVendidos)
);

// Datos para el gráfico de pastel
$dataPie = array(
    'labels' => array_keys($productosVendidos),
    'data' => array_values($productosVendidos)
);
?>


<!-- Vista para reporte de ventas -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <!-- <link href="../assets/css/tailwind.css" rel="stylesheet"> -->
    <script src="assets/js/tailwind.js"></script>
    <script src="assets/js/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 grid grid-cols-12 w-full">
    <div class="col-span-2 px-4">
        <h1 class="text-3xl font-bold mb-4">Menú</h1>
        <ul class="space-y-2">
            <li><a href="index.php?action=listar_productos" class="text-blue-500 hover:underline">Listar Productos</a></li>
            <li><a href="index.php?action=agregar_producto" class="text-blue-500 hover:underline">Agregar Producto</a></li>
            <li><a href="index.php?action=reporte_ventas" class="text-blue-500 hover:underline">Reporte de Ventas</a></li>
            <li><a href="index.php?action=docs" class="text-blue-500 hover:underline">Documentacion</a></li>
            <li><a href="index.php" class="text-blue-500 hover:underline">Salir</a></li>
        </ul>
    </div>
    <div class="px-4 col-span-10">
        <h1 class="text-3xl font-bold mb-4">Reporte de Ventas</h1>
        <div class="grid grid-cols-2 w-full">
            <div class="my-4">
                <canvas id="graficoBarras"></canvas>
            </div>
            <div class="my-4">
                <canvas id="graficoPie"></canvas>
            </div>
        </div>
    
    </div>
    <script>
        // Configuración y dibujo del gráfico de barras
        var ctxBarras = document.getElementById("graficoBarras").getContext("2d");
        var myBarChart = new Chart(ctxBarras, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($dataBarras['labels']); ?>,
                datasets: [{
                    label: 'Cantidad Vendida por Producto',
                    data: <?php echo json_encode($dataBarras['data']); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Configuración y dibujo del gráfico de pastel
        var ctxPie = document.getElementById("graficoPie").getContext("2d");
        var myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($dataPie['labels']); ?>,
                datasets: [{
                    data: <?php echo json_encode($dataPie['data']); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    </div>
</body>
</html>
