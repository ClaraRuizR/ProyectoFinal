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
    <title>Agenda</title>
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
            <h1>Agenda</h1>"

            <fieldset>
                <legend>Elige una pantalla</legend>

                <div id="enlacesMenu">
                    <div id="enlaceIcono"><a href="horarioConsulta1Vista.php?contadorSemana=1"><img id='imgMenu' src="../../img/menu5.jpeg" alt="imgMenu5"><p id="enlaceimg">Consulta 1</p></a></div>
                    <div id="enlaceIcono"><a href="horarioConsulta2Vista.php?contadorSemana=1"><img id='imgMenu' src="../../img/menu6.jpeg" alt="imgMenu6"><p id="enlaceimg">Consulta 2</p></a></div>
                </div>
                
            </fieldset>
        </div>
    </div>
</body>
</html>