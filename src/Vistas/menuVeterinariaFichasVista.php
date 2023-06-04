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
    <title>Fichas</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <a href="menuInicioVeterinaria.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1>Fichas</h1>"

            <fieldset>
                <legend>Elige una pantalla</legend>

                <div id="enlacesMenu">
                    <div id="enlaceIcono"><a href="listaMascotasVista.php?filtros=no"><img id='imgMenu' src="../../img/menu3.jpeg" alt="imgMenu3"><p id="enlaceimg">
                    Fichas de mascota</p></a></div>
                    <div id="enlaceIcono"><a href="listaTitularesVista.php?filtros=no"><img id='imgMenu' src="../../img/menu4.jpeg" alt="imgMenu4"><p id="enlaceimg">Fichas de titular</p></a></div>
                </div>
                
            </fieldset>
        </div>
    </div>
</body>
</html>