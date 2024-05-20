<?php
include("../../../modelo/sessiones/verificacion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Compra de productos</title>
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

    <div class="d-flex justify-content-center">
        <div class="form">
            <form action="" onsubmit="return validar();">
                <h1 class="form_title">Quejas y Reclamos</h1>

                <div class="form-floating mb-3">
                    <input type="email" readonly class="form-control" id="nombre" placeholder="mario" autocomplete="name" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'N/A'; ?>" />
                    <label for="nombre">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" readonly class="form-control" id="apellido" placeholder="apellido" autocomplete="name" value="<?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : 'N/A'; ?>" />
                    <label for="nombre">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" readonly class="form-control" id="usuario" placeholder="name@example.com" autocomplete="email" value="<?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : 'N/A'; ?>" />
                    <label for="usuario">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="producto" aria-label="Producto">
                        <option value="" selected>Selecciona un producto</option>
                        <option value="producto1">Producto 1</option>
                        <option value="producto2">Producto 2</option>
                        <option value="producto3">Producto 3</option>
                    </select>
                    <label for="producto">Producto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="direccion" placeholder="Direccion" autocomplete="address-level1" />
                    <label for="direccion">Direccion</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dia" placeholder="Dia" autocomplete="address-level1" />
                    <label for="dia">Dia de reclamos</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="hora" placeholder="Hora" autocomplete="name" />
                    <label for="hora">Hora de llegada</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="hora" placeholder="Hora" autocomplete="name" />
                    <label for="hora">Pruebas</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="texto" placeholder="texto" autocomplete="name" />
                    <label for="text">Descripcion de pqrs</label>
                </div>

                <div class="d-grid gap-2 col-12 mx-auto mb-3">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../controlador/usuario/pqrs.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>