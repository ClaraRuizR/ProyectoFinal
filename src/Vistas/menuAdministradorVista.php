<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/peluqueria.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Menú de administrador</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <a href="menuAdministradorVista.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1>Menú de administrador</h1>"

            <fieldset>
                <legend>Elige una pantalla</legend>

                <div id="enlacesMenu">
                    <div id="enlaceIcono"><a href="menuInicioVeterinaria.php"><img id='imgMenu' src="../../img/menu7.jpeg" alt="imgMenu7"><p id="enlaceimg">Menú de inicio</p></a></div>
                    <div id="enlaceIcono"><a href="crearUsuariosVista.php"><img id='imgMenu' src="../../img/menu8.jpeg" alt="imgMenu8"><p id="enlaceimg">Nuevo usuario</p></a></div>
                </div>
                
            </fieldset>
        </div>
    </div>
</body>
</html>