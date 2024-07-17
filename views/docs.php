<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documentación del Programa</title>
    <script src="assets/js/tailwind.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #1a202c;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 8px;
            margin-bottom: 16px;
        }
        h2 {
            margin-top: 24px;
        }
        h3 {
            margin-top: 20px;
        }
        p {
            margin-bottom: 12px;
        }
        pre {
            background-color: #f7fafc;
            padding: 16px;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            overflow-x: auto;
        }
        code {
            font-family: Consolas, monospace;
            font-size: 14px;
        }
        .section {
            margin-top: 32px;
        }
    </style>
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
    <div class="">
        <h1 class="text-2xl font-bold">Documentación del Programa</h1>

        <div class="section">
            <h2 class="text-xl font-semibold">Introducción</h2>
            <p>Esta página contiene la documentación del programa desarrollado en PHP y MySQL.</p>
            <p>El programa tiene como objetivo...</p>
        </div>

        <div class="section">
            <h2 class="text-xl font-semibold">Requisitos del Sistema</h2>
            <h3 class="text-lg font-semibold">Requisitos de Hardware</h3>
            <p>
                <ul>
                    <li>pc con compativilidad con appserve</li>
                </ul>
            </p>
            <h3 class="text-lg font-semibold">Requisitos de Software</h3>
            <p>
                <ul>
                    <li>appserve instalado</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                </ul>
            </p>
        </div>

        <div class="section">
            <h2 class="text-xl font-semibold">Instalación</h2>
            <h3 class="text-lg font-semibold">Descarga del Código Fuente</h3>
            <pre><code class="text-sm">git clone https://github.com/JordanTX21/patronesfinal</code></pre>
            <h3 class="text-lg font-semibold">Configuración del Entorno</h3>
            <p>...</p>
            <h3 class="text-lg font-semibold">Configuración de la Base de Datos</h3>
            <p>
            <pre><code class="language-php">
                &lt;?php
                function conectarDB() {
                    $conexion = new mysqli('localhost', 'usuario', 'contrasenia', 'nombre_de_la_bd');
                    if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                    }
                    return $conexion;
                }
                ?&gt;
            </code></pre>
            </p>
            <h3 class="text-lg font-semibold">Despliegue</h3>
            <p>Clonar el proyecto en la carpeta /www de appserve</p>
        </div>

        <div class="section">
            <h2 class="text-xl font-semibold">Estructura del Proyecto</h2>
            <p>
                <pre>
                    <code>
                    - index.php           // Controlador principal
                    - models/
                        - Producto.php      // Modelo para productos
                        - Venta.php         // Modelo para ventas
                    - views/
                        - menu.php          // Pantalla de menú
                        - productos/
                            - listar.php      // Vista para listar productos
                            - agregar.php     // Vista para agregar producto
                            - editar.php      // Vista para editar producto
                        - ventas/
                            - reporte.php     // Vista para generar reporte de ventas
                    - assets/
                        - css/
                        - js/
                            - Chart.min.js    // Biblioteca Chart.js (se puede incluir desde CDN)
                            - tailwind.js    // Archivo JS de Tailwind (se puede incluir desde CDN también)
                    - includes/
                        - database.php      // Archivo para la conexión a la base de datos
                        - functions.php     // Funciones útiles y lógica de la aplicación

                    </code>
                </pre>
            </p>
        </div>

        <div class="section">
            <h2 class="text-xl font-semibold">Funcionalidades Principales</h2>
            <h3 class="text-lg font-semibold">Gestión de Productos</h3>
            <p>El programa permite listar, agregar, editar y eliminar productos</p>
            <h3 class="text-lg font-semibold">Reporte de Ventas</h3>
            <p>Se genera un reporte de las ventas en grafico de barras y pye</p>
        </div>

        <div class="section">
            <h2 class="text-xl font-semibold">Patrones de Diseño Utilizados</h2>
            <h3 class="text-lg font-semibold">MVC (Modelo-Vista-Controlador)</h3>
            <p>
            El patrón MVC se utiliza para separar la lógica de negocio (modelo), la presentación (vista) y el control de la aplicación (controlador), lo cual facilita la estructuración y mantenimiento del código. 
            </p>
            <h3 class="text-lg font-semibold">DAO (Objeto de Acceso a Datos)</h3>
            <p>El patrón DAO se utiliza para encapsular el acceso a la base de datos, proporcionando una capa de abstracción entre la lógica de la aplicación y los detalles específicos de cómo se accede y manipula la base de datos.</p>
        </div>

        <footer class="text-sm text-gray-600 mt-4">
            <p>&copy; 2024 JTX21. Todos los derechos reservados.</p>
        </footer>
    </div>
    </div>
    </div>
</body>
</html>
