<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Servicio/mascotasServicio.php");
require_once("../Servicio/titularServicio.php");
require_once("../Servicio/consultaServicio.php");


$mascotasServicio = new MascotasServicio();
$titularesServicio = new TitularServicio();
$consultaServicio = new ConsultaServicio();

$idMascota = $_GET["id"];

$listaMascotas = $mascotasServicio->obtener('ID', $idMascota);
$titular = $titularesServicio->buscarTitularPorId($listaMascotas[0]->getTitular());

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fichaMascota.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Ficha de mascota</title>
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
            <h1><?php print($listaMascotas[0]->getNombre())?></h1>

            <fieldset>
                <legend>Datos de mascota</legend>

                <table cellspacing="0">

                    <tr>
                        <td>Nombre:</td>
                        <td id='borde'>
                            <?php print($listaMascotas[0]->getNombre())?>
                        </td>
                        <td>Color:</td>
                        <td><?php print($listaMascotas[0]->getColor())?></td>
                    </tr>
    
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td id='borde'><?php print($listaMascotas[0]->getFechaNacimiento())?></td>
                        <td>Pasaporte:</td>
                        <td><?php print($listaMascotas[0]->getPasaporte())?></td>
                    </tr>
                    
                   <tr>
                        <td>Especie:</td>
                        <td id='borde'><?php print($listaMascotas[0]->getEspecie())?></td>
                        <td>Código de chip:</td>
                        <td><?php print($listaMascotas[0]->getCodigoChip())?></td>
                   </tr>
    
                    <tr>
                        <td>Sexo:</td>
                        <td id='borde'><?php print($listaMascotas[0]->getSexo())?></td>
                        <td>Operado:</td>
                        <td><?php print($listaMascotas[0]->getOperado())?></td>
                    </tr>
    
                    <tr>
                        <td>Raza:</td>
                        <td id='borde'><?php print($listaMascotas[0]->getRaza())?></td>
                        <td>Fecha de alta:</td>
                        <td><?php print($listaMascotas[0]->getFechaAlta())?></td>
                    </tr>
    

    
    
                </table>
                <?php
                    echo"<div class='enlacePie'><a href='editarMascotaVista.php?idMascota=".$idMascota."&idTitular=".$titular->getID()."'>Editar ficha</a></div>";
                ?>
            </fieldset>
            
            <fieldset>
                <legend>Titular</legend>
                <table cellspacing="0">
                    <tr>
                        <td>Nombre:</td>
                        <td><?php print($titular->getNombre())?></td>
                    </tr>
                    <tr>
                        <td>Residencia:</td>
                        <td><?php print($titular->getDomicilio())?></td>
                    </tr>
                </table>
                <?php
                    echo"<div class='enlacePie'><a href='fichaTitularVista.php?id=".$titular->getID()."'>Acceder a ficha</a></div>";
                ?>
            </fieldset>

            <h1>Consultas</h1>

            <fieldset>
                <legend>Consultas</legend>
                <table cellspacing="0">
                    <?php 

                    $listaConsultas = $consultaServicio->buscarConsultasporMascota($listaMascotas[0]->getID());

                    foreach($listaConsultas as $consulta){
                        echo"<tr>";
                        echo"<td>".$consulta->getFecha()."</td>";
                        echo"<td><a href='consultaVista.php?id=".$consulta->getID()."'>Ver consulta</a></td>";
                        echo"</tr>";
                    }
                    echo"</table>";
                    echo"<div class='enlacePie'><a href='nuevaConsultaVista.php?idMascota=".$listaMascotas[0]->getID()."'>Nueva consulta</a></div>";
                ?>
            </fieldset>
        </div>
    </div>
</body>
</html>
