<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

//Consulta sql 
$sql = "SELECT imagen, titulo, precio, descripcion FROM productosanimales";
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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Animales</title>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../img/index/menu.png" alt="" />
            </label>
            <br /><br />
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="indexDos.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                            </svg></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="" />
        </div>
    </header>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $producto) : ?>
                    <div class="col" style="width: 30%;">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="Productos para animales" >
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['titulo']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="card-text">Precio: <?php echo htmlspecialchars($producto['precio']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center h3">No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../controlador/aviso.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>