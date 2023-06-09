<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/consultaServicio.php");
require_once("../Servicio/mascotasServicio.php");
require_once("../Servicio/trabajadorServicio.php");

$veterinario = $_POST["veterinario"];
$mascota = intval($_POST["mascota"]);
$motivoConsulta = $_POST["motivoConsulta"];
$fechaConsulta = $_POST["fechaConsulta"];
$antecedentesConsulta = $_POST["antecedentesConsulta"];
$pesoMascotaConsulta = $_POST["pesoMascotaConsulta"];
$temperaturaMascotaConsulta = $_POST["temperaturaMascotaConsulta"];
$exploracionConsulta = $_POST["exploracionConsulta"];
$diagnosticoConsulta = $_POST["diagnosticoConsulta"];
$actuacionConsulta = $_POST["actuacionConsulta"];
$procedimientosConsulta = $_POST["procedimientosConsulta"];
$anestesiaConsulta = $_POST["anestesiaConsulta"];
$medicacionInyectadaConsulta = $_POST["medicacionInyectadaConsulta"];
$medicamentosCedidosConsulta = $_POST["medicamentosCedidosConsulta"];
$dietasConsulta = $_POST["dietasConsulta"];
$tiendaConsulta = $_POST["tiendaConsulta"];
$otrosConsulta = $_POST["otrosConsulta"];
$edit = $_POST["edit"];

$consultaServicio = new ConsultaServicio();
$trabajadorServicio = new TrabajadorServicio();

$trabajador = $trabajadorServicio->buscarConFiltros('nombre', $veterinario);
$idTrabajador = $trabajador[0]->getID();

if($edit == "s"){
    $idConsulta = $_POST["idConsulta"];
    $respuesta = $consultaServicio->editarConsulta($idConsulta, $idTrabajador, $mascota, $motivoConsulta, $fechaConsulta, $antecedentesConsulta, $pesoMascotaConsulta, $temperaturaMascotaConsulta, $exploracionConsulta, $diagnosticoConsulta, $actuacionConsulta, $procedimientosConsulta, $anestesiaConsulta, $medicacionInyectadaConsulta, $medicamentosCedidosConsulta, $dietasConsulta, $tiendaConsulta, $otrosConsulta);

} elseif($edit == "n"){
    $respuesta = $consultaServicio->crearConsulta($idTrabajador, $mascota, $motivoConsulta, $fechaConsulta, $antecedentesConsulta, $pesoMascotaConsulta, $temperaturaMascotaConsulta, $exploracionConsulta, $diagnosticoConsulta, $actuacionConsulta, $procedimientosConsulta, $anestesiaConsulta, $medicacionInyectadaConsulta, $medicamentosCedidosConsulta, $dietasConsulta, $tiendaConsulta, $otrosConsulta);

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
    <title>Consulta registrada</title>
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
                echo"$respuesta";
                echo"<a id='enlaceFichaCreada' href='consultaVista.php?id=".$consultaServicio->obtenerIdUltimaConsultaRegistrada()."'>Ver consulta</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>