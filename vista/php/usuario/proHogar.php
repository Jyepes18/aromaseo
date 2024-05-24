<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

//Consulta sql 
$sql = "SELECT imagen, titulo, precio, descripcion FROM productoshogar";
$resultado = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Array para almacenar los productos
    $productos = array();

    // Obtener los productos de la consulta
    while ($row = mysqli_fetch_assoc($resultado)) {
        $productos[] = $row;
    }
}
// Cerrar la conexión
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Animales</title>
    <style>
        .card img {
            height: 400px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title,
        .card-text {
            margin-bottom: auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="Menú" />
            </label>
            <br /><br />
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="indexDos.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="Logo" />
        </div>
    </header>

    <div class="container mt-4">
        <?php if (!empty($productos)) : ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($productos as $producto) : ?>
                    <div class="col-12 col-md-4">
                        <div class="card h-100">
                            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="Productos para animales">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['titulo']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="card-text">Precio: <?php echo htmlspecialchars($producto['precio']); ?></p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-outline-info" onclick="location.href='compra.php'">Comprar</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-center h3">No hay productos disponibles.</p>
        <?php endif; ?>
    </div>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>