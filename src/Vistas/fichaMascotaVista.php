<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Negocio/mascotasNegocio.php");
require_once("../Negocio/titularNegocio.php");
require_once("../Negocio/consultaNegocio.php");


$mascotasNegocio = new MascotasNegocio();
$titularesNegocio = new TitularNegocio();
$consultasNegocio = new ConsultaNegocio();

$idMascota = $_GET["id"];

$listaMascotas = $mascotasNegocio->obtener('ID', $idMascota);
$titular = $titularesNegocio->buscarTitularPorId($listaMascotas[0]->getTitular());

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
                <img src="../../img/logo.png" alt="logo">
            </div>
            <div class="nav">
                <a href=''>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1><?php print($listaMascotas[0]->getNombre())?></h1>

            <fieldset>
                <legend>Datos de mascota</legend>

                <table cellspacing="0">

                    <tr>
                        <td>Nombre:</td>
                        <td>
                            <?php print($listaMascotas[0]->getNombre())?>
                        </td>
                    </tr>
    
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><?php print($listaMascotas[0]->getFechaNacimiento())?></td>
                    </tr>
                    
                   <tr>
                        <td>Especie:</td>
                        <td><?php print($listaMascotas[0]->getEspecie())?></td>
                   </tr>
    
                    <tr>
                        <td>Sexo:</td>
                        <td><?php print($listaMascotas[0]->getSexo())?></td>
                    </tr>
    
                    <tr>
                        <td>Raza:</td>
                        <td><?php print($listaMascotas[0]->getRaza())?></td>
                    </tr>
    
                    <tr>
                        <td>Color:</td>
                        <td><?php print($listaMascotas[0]->getColor())?></td>
                    </tr>
    
                    <tr>
                        <td>Pasaporte:</td>
                        <td><?php print($listaMascotas[0]->getPasaporte())?></td>
                    </tr>
    
                    <tr>
                        <td>Código de chip:</td>
                        <td><?php print($listaMascotas[0]->getCodigoChip())?></td>
                    </tr>
    
                    <tr>
                        <td>Operado:</td>
                        <td><?php print($listaMascotas[0]->getOperado())?></td>
                    </tr>
    
                    <tr>
                        <td>Fecha de alta:</td>
                        <td><?php print($listaMascotas[0]->getFechaAlta())?></td>
                    </tr>
    
    
                </table>
                <div class="enlacePie"><a href=''>Editar ficha</a></div>
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
                <div class="enlacePie"><a href=''>Acceder a ficha</a></div>
            </fieldset>

            <h1>Consultas</h1>

            <fieldset>
                <legend>Consultas</legend>
                <table cellspacing="0">
                    <?php 

                    $listaConsultas = $consultasNegocio->buscarConsultasporMascota($listaMascotas[0]->getID());

                    foreach($listaConsultas as $consulta){
                        echo"<tr>";
                        echo"<td>".$consulta->getFecha()."</td>";
                        echo"<td><a href='consultaVista.php?id=".$consulta->getID()."'>Ver consulta</a></td>";
                        echo"</tr>";
                    }
                    ?>
                    
                </table>
            </fieldset>
        </div>
    </div>
</body>
</html>
