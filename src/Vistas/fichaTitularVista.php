<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Servicio/mascotasServicio.php");
require_once("../Servicio/titularServicio.php");

$mascotasServicio = new MascotasServicio();
$titularesServicio = new TitularServicio();

$idTitular = $_GET["id"];

$titular = $titularesServicio->buscarTitularPorId($idTitular);
$listaMascotas = $mascotasServicio->obtener('id_titular', $titular->getID());

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
                <a href="menuInicioVeterinaria.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1><?php print($titular->getNombre())?></h1>
            
            <fieldset>
                <legend>Información general</legend>
                <table cellspacing="0">

                    <tr>
                        <td>Nombre:</td>
                        <td id='borde'><?php print($titular->getNombre())?></td>
                        <td>Código postal:</td>
                        <td><?php print($titular->getCodigoPostal())?></td>
                    </tr>
    
                    <tr>
                        <td>DNI:</td>
                        <td id='borde'><?php print($titular->getDNI())?></td>
                        <td>Número de contacto:</td>
                        <td><?php print($titular->getNumContacto())?></td>
                    </tr>
                    
                   <tr>
                        <td>Domicilio:</td>
                        <td id='borde'><?php print($titular->getDomicilio())?></td>
                        <td>Fecha alta:</td>
                        <td><?php print($titular->getFechaAlta())?></td>
                   </tr>
    

                </table>

                <?php
                    echo"<div class='enlacePie'><a href='editarTitularVista.php?idTitular=".$idTitular."'>Editar ficha</a></div>";
                ?>
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