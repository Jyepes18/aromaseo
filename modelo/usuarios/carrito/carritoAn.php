<?php
include("../../conexion.php");

session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    agregarAlCarrito($conn, $id, $cantidad);
}

if (isset($_GET['eliminar'])) {
    $index = $_GET['eliminar'];
    eliminarDelCarrito($index);
}

if (isset($_GET['cambiarCantidad']) && isset($_GET['cantidad'])) {
    $index = $_GET['cambiarCantidad'];
    $nuevaCantidad = $_GET['cantidad'];
    cambiarCantidadEnCarrito($index, $nuevaCantidad);
}

function agregarAlCarrito($conn, $id, $cantidad) {
    foreach ($_SESSION['carrito'] as $index => $item) {
        if ($item['id'] == $id) {
            $_SESSION['carrito'][$index]['cantidad'] += $cantidad;

            $sql = "UPDATE productosAnimales SET cantidad = cantidad - ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $cantidad, $id);
            $stmt->execute();

            header("Location: ../../../vista/php/usuario/proAnimales.php");
            exit();
        }
    }

    $sql = "SELECT * FROM productosAnimales WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['titulo'];
        $valor = $row['precio'];
        $stockDisponible = $row['cantidad'];

        if ($stockDisponible >= $cantidad) {
            $item = array('id' => $id, 'Nombre' => $nombre, 'Valor' => $valor, 'cantidad' => $cantidad);
            array_push($_SESSION['carrito'], $item);

            $nuevaCantidad = $stockDisponible - $cantidad;

            $sql = "UPDATE productosAnimales SET cantidad = ? WHERE id = ?";
            $stmt->prepare($sql);
            $stmt->bind_param("ii", $nuevaCantidad, $id);
            $stmt->execute();

            header("Location: ../../../vista/php/usuario/proAnimales.php");
            exit();
        } else {
            header("Location: ../../../vista/php/usuario/proAnimales.php?avisoCantidad=mal");
            exit();
        }
    } else {
        header("Location: ../../../vista/php/usuario/proAnimales.php?error=producto_no_encontrado");
        exit();
    }
}

function eliminarDelCarrito($index) {
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        header("Location: ../../../vista/php/usuario/proAnimales.php");
        exit();
    }
}

function cambiarCantidadEnCarrito($index, $nuevaCantidad) {
    if (isset($_SESSION['carrito'][$index])) {
        $_SESSION['carrito'][$index]['cantidad'] = $nuevaCantidad;
        header("Location: ../../../vista/php/usuario/proAnimales.php");
        exit();
    }
}
?>
