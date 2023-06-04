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
    <title>Menú principal</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <img src="../../img/logo.png" alt="logo">
            </div>
            <div class="nav">
                <a href=''>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1>Menú principal</h1>"

            <fieldset>
                <legend>Elige una pantalla</legend>

                <div id="enlacesMenu">
                    <div id="enlaceIcono"><a href="menuVeterinariaFichasVista.php"><img id='imgMenu' src="../../img/menu1.jpg" alt="imgMenu1"><p id="enlaceimg">Fichas</p></a></div>
                    <div id="enlaceIcono"><a href="menuVeterinariaAgendasVista.php"><img id='imgMenu' src="../../img/menu2.jpeg" alt="imgMenu2"><p id="enlaceimg">Agenda</p></a></div>
                </div>
                
            </fieldset>
        </div>
    </div>
</body>
</html>