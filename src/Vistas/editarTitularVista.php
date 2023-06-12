<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/titularServicio.php");

$idTitular = $_GET["idTitular"];

$titularServicio = new TitularServicio();
$titular = $titularServicio->buscarTitularPorId($idTitular);

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
    <title>Editar ficha de titular</title>
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
            <h1>Editar titular</h1>
            <form action="titularRegistradoVista.php" method="POST">
                <fieldset>
                    <legend>Información de titular</legend>
                    <table cellspacing="0">
                    titular
                        <tr>
                            <td><label for="nombreTitular">Nombre:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="nombreTitular" name="nombreTitular" <?php
                            echo"value='".$titular->getNombre()."'";
                            ?>required></td>
                        </tr>
    
                        <tr>
                            <td><label for="dniTitular">DNI:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="dniTitular" name="dniTitular" <?php
                            echo"value='".$titular->getDNI()."'";
                            ?>required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="domicilioTitular">Domicilio:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="domicilioTitular" name="domicilioTitular" <?php
                            echo"value='".$titular->getDomicilio()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="codigoPostalTitular">Código postal:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="codigoPostalTitular" name="codigoPostalTitular" <?php
                            echo"value='".$titular->getCodigoPostal()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="numeroContactoTitular">Número de contacto:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="numeroContactoTitular" name="numeroContactoTitular"<?php
                            echo"value='".$titular->getNumContacto()."'";
                            ?> required></td>
                        </tr>
    
                    </table>
                </fieldset>
                <?php
                    echo"<input id='edit' name='edit' type='hidden' value='s'>";
                    echo"<input id='idTitular' name='idTitular' type='hidden' value='".$idTitular."'>";
                ?>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>