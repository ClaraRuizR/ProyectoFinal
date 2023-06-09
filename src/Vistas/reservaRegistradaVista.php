<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/reservaServicio.php");
require_once("../Servicio/mascotasServicio.php");

$mascota = $_POST["nombreMascota"];
$tipoReserva = $_POST["tipoReserva"];
$sala = $_POST["sala"];
$fecha = $_POST["fechaReserva"];
$horaInicio = $_POST["horaInicio"];
$numContacto = $_POST["numeroContacto"];
$idTrabajador = $_POST["idTrabajador"];

$mascotaServicio = new MascotasServicio();
$mascotaObjeto = $mascotaServicio->obtener('nombre', $mascota);

if(empty($mascotaObjeto)){

    $respuesta = 'No se ha encontrado la mascota.';
} else{

    $idMascota = $mascotaObjeto[0]->getID();

    $reservaServicio = new ReservaServicio();
    $respuesta = $reservaServicio->crearReserva($idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto);
    $idReserva = $reservaServicio->obtenerIdUltimaReservaRegistrada();
    $respuesta2 = $reservaServicio->crearReservaTrabajador($idReserva, $idTrabajador);
}

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
                <a href="menuInicioVeterinaria.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <div class="mensaje">
                <?php

                if($sala == 'Peluquería'){
                    $reserva = 'PeluqueriaVista.php';
                } elseif ($sala == "Consulta 1"){
                    $reserva = 'Consulta1Vista.php';
                }elseif ($sala == "Consulta 2"){
                    $reserva = 'Consulta2Vista.php';
                }

                $bothTrue = str_contains('Reserva guardada con éxito.', $respuesta) && str_contains('Reserva guardada con éxito.', $respuesta2);
                $bothFalse = !str_contains('Reserva guardada con éxito.', $respuesta) && !str_contains('Reserva guardada con éxito.', $respuesta2);

                if($bothTrue){
                    echo"$respuesta";
                }else if($bothFalse){
                    echo"$respuesta - $respuesta2";
                }else{
                    echo"Consulta inválida.";
                }

                
                echo"<a id='enlaceFichaCreada' href='horario$reserva?contadorSemana=0'>Volver al horario</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>