<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Negocio/mascotasNegocio.php");
require_once("../Negocio/titularNegocio.php");

$mascotasNegocio = new MascotasNegocio();
$titularesNegocio = new TitularNegocio();

$idTitular = $_GET["id"];

$titular = $titularesNegocio->buscarTitularPorId($idTitular);
$listaMascotas = $mascotasNegocio->obtener('id_titular', $titular->getID());

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
    <title>Ficha de titular</title>
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
            <h1><?php print($titular->getNombre())?></h1>
            
            <fieldset>
                <legend>Información general</legend>
                <table cellspacing="0">

                    <tr>
                        <td>Nombre:</td>
                        <td><?php print($titular->getNombre())?></td>
                    </tr>
    
                    <tr>
                        <td>DNI:</td>
                        <td><?php print($titular->getDNI())?></td>
                    </tr>
                    
                   <tr>
                        <td>Domicilio:</td>
                        <td><?php print($titular->getDomicilio())?></td>
                   </tr>
    
                    <tr>
                        <td>Código postal:</td>
                        <td><?php print($titular->getCodigoPostal())?></td>
                    </tr>
    
                    <tr>
                        <td>Número de contacto:</td>
                        <td><?php print($titular->getNumContacto())?></td>
                    </tr>
    
                    <tr>
                        <td>Fecha alta:</td>
                        <td><?php print($titular->getFechaAlta())?></td>
                    </tr>
    
                </table>
            </fieldset>

            <fieldset>
                <legend>Mascotas</legend>
                <table cellspacing="0">
                    <?php
                        foreach($listaMascotas as $mascota){
                            echo"<tr>";
                            echo"<td>";
                            print($mascota->getNombre());
                            echo"</td>";
                            echo"<td><a href='fichaMascotaVista.php?id=".$mascota->getID()."'>Acceder a ficha</a></td>";
                            echo"</tr>";
                        }
                        echo"</table>";
                        echo"<div class='enlacePie'><a href='nuevaMascotaVista.php?idTitular=".$titular->getID()."'>Añade una nueva mascota a este tituar</a></div>";
                ?>
            </fieldset>

        </div>
    </div>
</body>
</html>