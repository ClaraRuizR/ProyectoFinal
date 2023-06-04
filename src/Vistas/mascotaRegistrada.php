<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Controlador/mascotasControlador.php");

$pasaporte = $_POST["pasaporteMascota"];
$nombre = $_POST["nombreMascota"];
$titular = intval($_POST["idTitular"]);
$especie = $_POST["selectEspecieMascota"];
$raza = $_POST["razaMascota"];
$sexo = $_POST["selectSexoMascota"];
$color = $_POST["colorMascota"];
$codigoChip = $_POST["codigoChipMascota"];
$fechaNacimiento = $_POST["fechaNacimientoMascota"];
$operado = $_POST["selectOperadoMascota"];
$edit = $_POST["edit"];

$mascotasControlador = new MascotasControlador();

if($edit == "s"){
    $idMascota = intval($_POST["idMascota"]);
    $respuesta = $mascotasControlador->editarFicha($idMascota, $pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado);

} elseif($edit == "n"){
    $respuesta = $mascotasControlador->crearFicha($pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado);

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
    <title>Mascota registrada</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <img src="../../img/logo.png" alt="logo">
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <div class="mensaje">
                <?php
                echo"$respuesta";
                if($edit == "s"){
                    echo"<a id='enlaceFichaCreada' href='fichaMascotaVista.php?id=".$idMascota."'>Ver ficha</a>";
                
                } elseif($edit == "n"){
                    
                echo"<a id='enlaceFichaCreada' href='fichaMascotaVista.php?id=".$mascotasControlador->obtenerIdUltimaMascotaRegistrada()."'>Ver ficha</a>";
                }

                echo"<a id='enlaceFichaCreada' href='listaMascotasVista.php?filtros=no'>Volver a la lista de mascotas</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>