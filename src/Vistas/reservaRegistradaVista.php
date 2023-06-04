<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/reservaServicio.php");
require_once("../Controlador/mascotasControlador.php");

$idMascota = intval($_POST["idMascota"]);
$tipoReserva = $_POST["tipoReserva"];
$sala = $_POST["sala"];
$fecha = $_POST["fechaReserva"];
$horaInicio = $_POST["horaInicio"];
$numContacto = $_POST["numeroContacto"];

$reservaServicio = new ReservaServicio();
$respuesta = $reservaServicio->crearReserva($idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nuevaFicha.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Reserva registrada</title>
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
            <div class="mensaje">
                <?php

                if($tipoReserva == 'peluqueria'){
                    $reserva = 'PeluqueríaVista.php';
                } elseif ($tipoReserva == "veterinario"){
                    $reserva = 'VeterinariaVista.php';
                }

                

                echo"$respuesta";
                echo"<a id='enlaceFichaCreada' href='horario$reserva'>Volver al horario</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>