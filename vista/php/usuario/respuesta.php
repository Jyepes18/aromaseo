<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
    <link rel="stylesheet" href="../../css/respuU.css">
    <title>Respuesta al usuario</title>
</head>

<body>

    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="" />
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


    <div class="caja">
        <input type="text" placeholder="Nombre" name="name">
        <div class="textbox-main">
            <div class="textarea-container">
                <label for="msgA">Esta es tu queja</label>
                <textarea class="msgA" placeholder="Mensaje" name="msg" id="msgA"></textarea>
            </div>
            <p>-></p>
            <div class="textarea-container">
                <label for="msgU">Esta es la respuesta del administrador</label>
                <textarea class="msgU" placeholder="Mensaje" name="msg" id="msgU"></textarea>
            </div>
        </div>
    </div>
</body>

</html>