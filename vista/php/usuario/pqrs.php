<?php
include("../../../modelo/sessiones/verificacion.php");
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

    <div class="d-flex justify-content-center">
        <div class="form">
            <form id="miFormulario" action="../../../modelo/usuarios/pqrs/añadir.php" onsubmit="return validar();" method="POST" enctype="multipart/form-data">
                <h1 class="form_title">Quejas y Reclamos</h1>

                <div class="form-floating mb-3">
                    <input type="text" readonly class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="name" value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'N/A'; ?>" />
                    <label for="nombre">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" readonly class="form-control" id="apellido" name="apellido" placeholder="Apellido" autocomplete="name" value="<?php echo isset($_SESSION['apellido']) ? htmlspecialchars($_SESSION['apellido']) : 'N/A'; ?>" />
                    <label for="apellido">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" readonly class="form-control" id="usuario" name="usuario" placeholder="Correo" autocomplete="email" value="<?php echo isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo']) : 'N/A'; ?>" />
                    <label for="usuario">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="correoDos" name="correoDos" placeholder="Correo de contacto" autocomplete="email" />
                    <label for="correoDos">Correo de contacto (opcional)</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" autocomplete="address-level1" />
                    <label for="direccion">Dirección (opcional)</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dia" name="dia" placeholder="Día" autocomplete="address-level1" />
                    <label for="dia">Día de reclamo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Hora" autocomplete="name" />
                    <label for="hora">Hora de llegada</label>
                </div>

                <div class="form-floating mb-3">
                    <label for="imagen" class="form-label">Imagen de soporte</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" required>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de PQRS"></textarea>
                    <label for="descripcion">Descripción de PQRS</label>
                </div>

                <div class="d-grid gap-2 col-12 mx-auto mb-3">
                    <button class="btn btn-primary" id="enviarBtn" type="submit">Enviar</button>
                </div>
            </form>

        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../controlador/usuario/pqrs.js"></script>
    <script>
        document.getElementById('correoDos').addEventListener('click', function() {
            Swal.fire({
                icon: "info",
                text: "Escribe tu correo de Gmail o si es el mismo que el de arriba haz caso omiso",
                footer: "Esto para darte una info via correo gmail"
            });
        });

        document.getElementById('enviarBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Previene el envío del formulario inmediatamente

            setTimeout(function() {
                Swal.fire({
                    icon: "info",
                    title: "Enviado",
                    text: "Te respondemos por vía Gmail"
                }).then(() => {
                    document.getElementById('miFormulario').submit();
                });
            }, 1000); // 1000 milisegundos = 1 segundos
        });
    </script>
</body>

</html>