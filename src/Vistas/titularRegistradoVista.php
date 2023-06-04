<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Controlador/titularControlador.php");

$nombre = $_POST["nombreTitular"];
$dniTitular = $_POST["dniTitular"];
$domicilioTitular = $_POST["domicilioTitular"];
$codigoPostalTitular = $_POST["codigoPostalTitular"];
$numeroContactoTitular = $_POST["numeroContactoTitular"];
$edit = $_POST["edit"];

$titularControlador = new TitularControlador();



if($edit == "s"){
    $idTitular = $_POST["idTitular"];
    $respuesta = $titularControlador->editarFicha($idTitular, $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular);

} elseif($edit == "n"){
    $respuesta = $titularControlador->crearFicha($nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular);

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

                    echo"<a id='enlaceFichaCreada' href='fichaTitularVista.php?id=".$idTitular."'>Ver ficha</a>";
                } elseif($edit == "n"){
                    
                echo"<a id='enlaceFichaCreada' href='fichaTitularVista.php?id=". $titularControlador->obtenerIdUltimoTitularRegistrado()."'>Ver ficha</a>";
                }
                

                echo"<a id='enlaceFichaCreada' href='listaTitularesVista.php?filtros=no'>Volver a la lista de titulares</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>