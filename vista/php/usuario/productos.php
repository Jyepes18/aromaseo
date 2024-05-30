<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

// Obtener el correo del usuario desde la sesión
$correo_usuario = $_SESSION["correo"];

// Preparar la consulta SQL para obtener todas las compras agrupadas por fecha
$sql = "SELECT fecha, GROUP_CONCAT(producto SEPARATOR ',<br> ') AS productos, SUM(cantidad) AS total_cantidad, SUM(total) AS total_general FROM compra WHERE correo = ? GROUP BY fecha";

// Preparar la sentencia
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo_usuario);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado
$result = $stmt->get_result();

// Inicializar una variable para almacenar el total general
$total_general = 0;

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Compra de productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table-container {
            max-width: 1000px;
            margin: 20px auto;
        }

        .table-responsive {
            width: auto;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot td {
            font-weight: bold;
        }

        tfoot tr:last-child td {
            border-top: 2px solid #333;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="menu" />
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
            <img src="../../img/index/logo.png" alt="logo" />
        </div>
    </header>

    <div class="table-container">
        <div class="table-responsive">
            <h1 class="text-center ">Compras en proceso</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha de entrega <br>
                            AAAA/MM/DD</th>
                        <th>Productos</th>
                        <th>Total cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verificar si hay compras para mostrar
                    if ($result->num_rows > 0) {
                        // Salida de datos para cada fila
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["fecha"] . "</td>";
                            echo "<td>" . $row["productos"] . "</td>";
                            echo "<td>" . $row["total_cantidad"] . "</td>";
                            echo "<td>$" . number_format($row["total_general"], 0, '', '.') . "</td>"; // Agregar símbolo
                            echo "</tr>";

                            // Sumar el total de cada compra al total general
                            $total_general += $row["total_general"];
                        }
                    } else {
                        echo "<tr><td class='text-danger' colspan='4'>No se encontraron compras.</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total General:</td>
                        <td><?php echo "$" . number_format($total_general, 0, '', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../controlador/usuario/pqrs.js"></script>
</body>

</html>