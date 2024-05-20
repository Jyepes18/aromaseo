<?php
include("../../../modelo/sessiones/verificacion.php");
// Suponiendo que tienes un array de productos con información
$productos = [
    ["imagen" => "../../img/productos/desengrasante.png", "titulo" => "Desengrasante", "descripcion" => "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."],
    // Agrega más productos aquí si es necesario
    ["imagen" => "../../img/productos/hidratante.png", "titulo" => "Hidratante", "descripcion" => "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."],
    ["imagen" => "../../img/productos/desengrasante.png", "titulo" => "Desengrasante", "descripcion" => "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."],
    ["imagen" => "../../img/productos/desengrasante.png", "titulo" => "Desengrasante", "descripcion" => "This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer."],

];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Hogar</title>
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
            <?php foreach ($productos as $producto) : ?>
                <div class="col" style="width: 30%;">
                    <div class="card">
                        <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['titulo']; ?></h5>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../controlador/aviso.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>