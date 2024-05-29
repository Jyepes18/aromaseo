<?php
// Incluir conexion a la bd
include("../../conexion.php");

//Incluir verificacion para saber si la sesion esta iniciada
include("../../sessiones/verificacion.php");

$compras = "SELECT 
    MIN(id) AS id,
    CONCAT(nombre, ' ', apellido) AS persona,
    correo,
    GROUP_CONCAT(
        CONCAT(
            'Direccion: ', direccion, '<br>',
            'Fecha: ', fecha, '<br>',
            'Producto: ', producto, '<br>',
            'Cantidad: ', cantidad, '<br>',
            'Precio: ', precio, '<br>'
        ) SEPARATOR '<br><br>'
    ) AS datos,
    SUM(precio) AS total_productos,
    CASE 
        WHEN SUM(precio) >= 100000 THEN 'Gratis'
        ELSE 'Pagado'
    END AS estado_pago
FROM compra
GROUP BY correo, fecha, persona;";




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../vista/css/adminis.css">
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
    <title>Administrador</title>
</head>

<body>
    <div class="sidebar close">
        <!--Logo-->
        <a href="#" class="logo-box">
            <i class='bx bxs-user-circle'></i>
            <div class="logo-name">
                <p>Hola
                    <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'N/A'; ?>
                </p>
            </div>
        </a>

        <!--Lista-->
        <ul class="sidebar-list">
            <li>
                <div class="title">
                    <a href="../../../vista/php/administrador/administrador.php" class="link">
                        <i class='bx bxs-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/administrador.php" class="link submenu-title">Dashboard</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/usuario.php" class="link">
                        <i class='bx bx-user'></i>
                        <span class="name">Usuarios</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/usuario.php" class="link submenu-title">Usuarios</a>
                    <a href="../usuario/datos.php" class="link">Ver Datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/proAnimales.php" class="link">
                        <i class='bx bxs-dog'></i>
                        <span class="name">Productos Animales</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/proAnimales.php" class="link submenu-title">Productos Animales</a>
                    <a href="../productoAn/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/proAutos.php" class="link">
                        <i class='bx bxs-car'></i>
                        <span class="name">Productos Automoviles</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/proAutos.php" class="link submenu-title">Productos Automoviles</a>
                    <a href="datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/prohogar.php" class="link">
                        <i class='bx bxs-home-heart'></i>
                        <span class="name">Productos Hogar</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/prohogar.php" class="link submenu-title">Productos Hogar</a>
                    <a href="../productoHo/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../pqrs/datos.php" class="link">
                        <i class='bx bxs-comment-error bx-flip-horizontal'></i>
                        <span class="name">PQRS</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../pqrs/datos.php" class="link submenu-title">PQRS</a>

                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../modelo/sessiones/cerrar.php" class="link">
                        <i class='bx bxs-exit bx-rotate-180'></i>
                        <span class="name">Salir</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../../../modelo/sessiones/cerrar.php" class="link submenu-title">Salir</a>

                </div>
            </li>
        </ul>
    </div>

    <!--Home section-->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <main class="main col">
                    <div class="row justify-content-start">
                        <div class="columna col-lg-12">

                            <!-- Formulario de búsqueda -->
                            <div class="container-fluid">
                                <form class="d-flex input" action="busqueda.php" method="post">
                                    <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                                    <button class="btn btn-outline-primary" type="submit" name="enviar"><b>Buscar</b></button>
                                </form>
                            </div>

                            <!-- Tabla de datos con Bootstrap -->
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Nombre y Apellido</th>
                                            <th>Correo</th>
                                            <th>Datos</th>
                                            <th>Total de productos</th>
                                            <th>Domicilio</th>
                                            <th>Operacion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = mysqli_query($conn, $compras);
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                        ?>
                                            <tr id="row-1">
                                                <td>
                                                    <?php echo $row["persona"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["correo"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["datos"]; ?>
                                                </td>

                                                <td class="text-center">
                                                    <?php echo number_format($row["total_productos"], 2, '.', ','); ?>$
                                                </td>

                                                <td>
                                                    <?php echo $row["estado_pago"]; ?>
                                                </td>

                                                <td class="text-center">
                                                    <button onclick="ocultarRegistro(1)" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        mysqli_free_result($resultado);
                                        ?>
                                    </tbody>

                                </table>

                                <button onclick="regresar(1)" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>



    </section>

    <script src="../../../controlador/administrador/adminis.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cargar el estado de las filas desde localStorage
            var hiddenRows = JSON.parse(localStorage.getItem('hiddenRows')) || [];
            hiddenRows.forEach(function(id) {
                var row = document.getElementById('row-' + id);
                if (row) {
                    row.style.display = 'none';
                }
            });
        });

        function ocultarRegistro(id) {
            // Encontrar la fila correspondiente
            var row = document.getElementById('row-' + id);
            if (row) {
                row.style.display = 'none'; // Ocultar la fila en la interfaz de usuario

                // Guardar el estado en localStorage
                var hiddenRows = JSON.parse(localStorage.getItem('hiddenRows')) || [];
                if (!hiddenRows.includes(id)) {
                    hiddenRows.push(id);
                    localStorage.setItem('hiddenRows', JSON.stringify(hiddenRows));
                }

                // Enviar solicitud AJAX para actualizar el estado del registro en la base de datos
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "ocultar.php?id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log("Registro ocultado exitosamente");
                    }
                };
                xhr.send();
            } else {
                console.error("Fila no encontrada para el ID: " + id);
            }
        }

        function regresar(id) {
            // Encontrar la fila correspondiente
            var row = document.getElementById('row-' + id);
            if (row) {
                row.style.display = ''; // Mostrar la fila en la interfaz de usuario

                // Actualizar el estado en localStorage
                var hiddenRows = JSON.parse(localStorage.getItem('hiddenRows')) || [];
                var index = hiddenRows.indexOf(id);
                if (index !== -1) {
                    hiddenRows.splice(index, 1);
                    localStorage.setItem('hiddenRows', JSON.stringify(hiddenRows));
                }

                // Enviar solicitud AJAX para actualizar el estado del registro en la base de datos
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "mostrar.php?id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log("Registro mostrado exitosamente");
                    }
                };
                xhr.send();
            } else {
                console.error("Fila no encontrada para el ID: " + id);
            }
        }
    </script>



</body>

</html>