<?php
include("../../conexion.php");

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['solicitar'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $producto = htmlspecialchars($_POST['producto']);
    $correo = htmlspecialchars($_POST['correo']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $fecha = $_POST['fecha']; // Formato AAAA-MM-DD

    // Validar que la fecha tenga el formato esperado
    if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
        die("Formato de fecha no válido: " . htmlspecialchars($fecha));
    }

    $precio = (float)$_POST['precio'];
    $cantidad = (int)$_POST['cantidad'];
    $total = (float)$_POST['total'];

    // Calcular el tipo de domicilio basado en el total
    $domicilio = $total >= 100000 ? "Domicilio gratis" : "Domicilio pagado";

    // Insertar datos en la tabla compra
    $stmt = $conn->prepare("INSERT INTO compra (nombre, apellido, producto, correo, direccion, fecha, precio, cantidad, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    $stmt->bind_param("ssssssdis", $nombre, $apellido, $producto, $correo, $direccion, $fecha, $precio, $cantidad, $total);

    if (!$stmt->execute()) {
        die("Error en el registro: " . $stmt->error);
    }

    header("Location: ../../../vista/php/usuario/indexDos.php");
    exit();
}
?>
