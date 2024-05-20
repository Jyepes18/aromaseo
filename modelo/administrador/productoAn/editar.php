<?php
//Incluir conexion a la bd
include("../../conexion.php");
//Verificar si la sesion esta inicada
include("../../sessiones/verificacion.php");
//Traer el id 
$id = $_GET['id'];
$actualizar = "SELECT * FROM productosanimales"

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../vista/css/adminis.css">
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
</head>

<body>
    <div class="sidebar close">
        <!--Logo-->
        <a href="#" class="logo-box">
            <i class='bx bxs-user-circle'></i>
            <div class="logo-name">
                <p>Hola</p>
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
                    <a href="usuario.php" class="link">
                        <i class='bx bx-user'></i>
                        <span class="name">Usuarios</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/usuario.php" class="link submenu-title">Usuarios</a>
                    <a href="datos.php" class="link">Ver Datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="" class="link">
                        <i class='bx bxs-dog'></i>
                        <span class="name">Productos Animales</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">Productos Animales</a>
                    <a href="" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="" class="link">
                        <i class='bx bxs-car'></i>
                        <span class="name">Productos Automoviles</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">Productos Automoviles</a>
                    <a href="" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="" class="link">
                        <i class='bx bxs-home-heart'></i>
                        <span class="name">Productos Hogar</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">Productos Hogar</a>
                    <a href="" class="link">Ver datos</a>
                </div>
            </li>


        </ul>

    </div>


    <!--Home section-->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">
                <p>
                    <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'N/A'; ?>
                    <?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : 'N/A'; ?>
                </p>
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="container-fluid">
                    <form action="proActualizar.php" method="post" class="row g-3 mt-4">
                        <h1 class="h1 text-center mx-auto mt-3">Registar un usuario nuevo</h1>
                        <?php
                        $resultado = mysqli_query($conn, $actualizar);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <input hidden type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>">

                            <div class="col-md-6">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            </div>

                            <div class="col-md-6">
                                <label for="apellido" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['titulo']; ?>">
                            </div>

                            <div class="col-6">
                                <label for="telefono" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="<?php echo $row['descripcion']; ?>"></textarea>
                            </div>

                            <div class="col-6">
                                <label for="correo" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio" value="<?php echo $row['precio']; ?>" id="precio" step="0.01" />
                            </div>




                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" name="registrar" class="btn btn-primary" style="padding: 10px 20px; font-size: 20px;">Actualizar datos</button>
                            </div>
                        <?php
                        }
                        mysqli_free_result($resultado);
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>