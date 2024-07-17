<?php
// Incluir lógica para listar productos desde el controlador o directamente aquí
    require_once 'models/Producto.php';

    $db = conectarDB();

    $producto = new Producto($db);

    $action=isset($_GET["action"])?$_GET["action"]:"";
    $codigo=isset($_GET["codigo"])?$_GET["codigo"]:"";
    if($action == 'eliminar_producto' && $codigo!=''){
        $producto->eliminarProducto($codigo);
        header("Location: index.php");
        exit();
    }

    $lista = $producto->listarProductos();
    
?>
<!-- Vista para listar productos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
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
        <h1 class="text-3xl font-bold mb-4">Listado de Productos</h1>
        <a href="index.php?action=agregar_producto" class="px-4 py-2 font-semibold flex items-center text-sm bg-cyan-500 text-white rounded-full shadow-sm">Agregar Producto</a>
        </div>

        <div class="relative rounded-xl overflow-auto">
            <div class="shadow-sm overflow-hidden my-8">
  <table class="border-collapse table-auto w-full text-sm">
    <thead>
      <tr>
        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">codigo</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">descripcion</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">fecha</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">precio</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">stock</th>
      </tr>
    </thead>
    <tbody class="bg-white dark:bg-slate-800">
        <?php foreach($lista as $key => $item){?>
        <tr>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$item["codigo"]?></td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$item["descripcion"]?></td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$item["fecha"]?></td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$item["precio"]?></td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$item["stock"]?></td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <a href="index.php?action=editar_producto&codigo=<?=$item["codigo"]?>" class="px-4 py-2 font-semibold flex items-center justify-center text-sm bg-cyan-500 text-white rounded-full shadow-sm">Editar</a>
                <a href="index.php?action=eliminar_producto&codigo=<?=$item["codigo"]?>" class="px-4 py-2 font-semibold flex items-center justify-center text-sm bg-cyan-500 text-white rounded-full shadow-sm">Eliminar</a>
                </td>
        </tr>
        <?php }?>
    </tbody>
  </table>
</div>
</div>
    </div>
    </div>
</body>
</html>
