<?php
// Incluir lógica para listar productos desde el controlador o directamente aquí
    require_once 'models/Producto.php';

    $db = conectarDB();

    $producto = new Producto($db);

    $action=isset($_GET["action"])?$_GET["action"]:"";
    $descripcion=isset($_GET["descripcion"])?$_GET["descripcion"]:"";
    $fecha=isset($_GET["fecha"])?$_GET["fecha"]:"";
    $precio=isset($_GET["precio"])?$_GET["precio"]:"";
    $stock=isset($_GET["stock"])?$_GET["stock"]:"";
    $codigo=isset($_GET["codigo"])?$_GET["codigo"]:"";
    if($action == 'editar_producto' && $codigo!='' && $descripcion!=''){
        $producto->editarProducto($codigo, $descripcion, $fecha, $precio, $stock);
        header("Location: index.php");
        exit();
    }

    if($action == 'editar_producto' && $codigo!='' && $descripcion==''){
        $prod = $producto->obtenerProducto($codigo);
        $descripcion=$prod["descripcion"];
        $fecha=$prod["fecha"];
        $precio=$prod["precio"];
        $stock=$prod["stock"];
        $codigo=$prod["codigo"];
    }
    if($action == 'agregar_producto' && $descripcion!=''){
        $producto->agregarProducto($descripcion, $fecha, $precio, $stock);
        $action="";
        $descripcion="";
        $fecha="";
        $precio="";
        $stock="";
        header("Location: index.php");
        exit();
    }
?>
<!-- Vista para listar productos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar de Productos</title>
    <!-- <link href="../assets/css/tailwind.css" rel="stylesheet"> -->
    <script src="assets/js/tailwind.js"></script>
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
        <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-4">Agregar Productos</h1>
        <a href="index.php?action=listar_productos" class="px-4 py-2 font-semibold flex items-center text-sm bg-cyan-500 text-white rounded-full shadow-sm">Listar Producto</a>
        </div>
        <div class="border-b border-gray-900/10 pb-12">
        <form action="index.php" method="GET">
            <input name="action" type="hidden" value="<?=$action?>">
            <input name="codigo" type="hidden" value="<?=$codigo?>">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="descripcion" class="block text-sm font-medium leading-6 text-gray-900">descripcion</label>
            <div class="mt-2">
              <input required value="<?=$descripcion?>" type="text" name="descripcion" id="descripcion" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

            <div class="sm:col-span-3">
                <label for="fecha" class="block text-sm font-medium leading-6 text-gray-900">fecha</label>
                <div class="mt-2">
                <input required value="<?=$fecha?>" type="date" name="fecha" id="fecha" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="precio" class="block text-sm font-medium leading-6 text-gray-900">precio</label>
                <div class="mt-2">
                <input required value="<?=$precio?>" type="number" step="0.01" min="0" name="precio" id="precio" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">stock</label>
                <div class="mt-2">
                <input required value="<?=$stock?>" type="number" step="0.01" min="0" name="stock" id="stock" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-6">
                <div>
                    <button type="submit" class="px-4 py-2 font-semibold text-center text-sm bg-cyan-500 text-white w-full rounded-full shadow-sm">Agregar Producto</button>
                </div>
            </div>

        </div>
        </form>
      </div>
    </div>
    </div>
</body>
</html>
