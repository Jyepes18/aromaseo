function validar() {
    var direccion, dia, hora, cantidad, precio;

    direccion = document.getElementById("direccion").value.trim();
    dia = document.getElementById("dia").value;
    hora = document.getElementById("hora").value;
    cantidad = parseFloat(document.getElementById('cantidad').value);
    precio = parseFloat(document.getElementById('precio').value);

    // Expresiones regulares para validar la dirección y la cantidad
    var exprecionParaDirecciones = /^[a-zA-Z0-9\s#-]+$/;
    var expresionParaNumeros = /^[0-9]+$/;

    if (direccion === "") {
        Swal.fire({
            text: "El campo dirección está vacío",
            icon: "error"
        });
        return false;
    } else if (direccion.length < 5) {
        Swal.fire({
            text: "La dirección debe tener al menos 5 caracteres",
            icon: "error"
        });
        return false;
    } else if (!exprecionParaDirecciones.test(direccion)) {
        Swal.fire({
            text: "La dirección no es válida. Solo se aceptan caracteres alfanuméricos y '#' y '-'",
            icon: "error"
        });
        return false;
    }

    if (isNaN(cantidad) || cantidad <= 0 || !expresionParaNumeros.test(cantidad)) {
        Swal.fire({
            text: "La cantidad no es válida. Por favor ingresa un número mayor a 0.",
            icon: "error"
        });
        return false;
    }

    if (isNaN(precio) || precio <= 0 || !expresionParaNumeros.test(precio)) {
        Swal.fire({
            text: "El precio no es válido. Por favor ingresa un número mayor a 0.",
            icon: "error"
        });
        return false;
    }

    // Permitir el envío del formulario si todas las validaciones pasaron
    return true;
}
