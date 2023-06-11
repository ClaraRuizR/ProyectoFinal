<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Controlador/titularControlador.php");
require_once("../Servicio/mascotasServicio.php");

$idTitular = $_GET["idTitular"];
$idMascota = $_GET["idMascota"];

$titularControlador = new TitularControlador();
$titular = $titularControlador->buscarTitularPorId($idTitular);

$mascotasServicio = new MascotasServicio();
$mascota = $mascotasServicio->obtener('ID', $idMascota);

$idTitular = $mascota[0]->getTitular()

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
    <title>Editar ficha de mascota</title>
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
            <h1>Editar mascota</h1>
            <form action="mascotaRegistrada.php" method="POST">
                <fieldset>
                    <legend>Información de mascota</legend>
                    <table cellspacing="0">
                    
                        <tr>
                            <td><label for="pasaporteMascota">Pasaporte:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="pasaporteMascota" name="pasaporteMascota"
                            <?php
                            echo"value='".$mascota[0]->getPasaporte()."'";
                            ?>
                            ></td>
                        </tr>
    
                        <tr>
                            <td><label for="nombreMascota">Nombre:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="nombreMascota" name="nombreMascota" 
                            <?php
                            echo"value='".$mascota[0]->getNombre()."'";
                            ?>required></td>
                        </tr>
                        
                        <?php
                            echo"<tr>";
                            echo"<td><label for='titularMascota'>Titular:</label></td>";
                            echo"<td><input placeholder='Escribe aquí...' type='text' id='titularMascota' name='titularMascota' value='".$titular->getNombre()."'></td>";
                            echo"</tr>";
                        ?>

                        <tr>
                            <td><label for="selectEspecieMascota">Especie:</label></td>
                            <td><select name="selectEspecieMascota" id="selectEspecieMascota"<?php
                            echo"value='".$mascota[0]->getEspecie()."'";
                            ?> required>
                                <option value="FEL">FEL</option>
                                <option value="CAN">CAN</option>
                                <option value="Otros">Otros</option>
                            </select></td>
                        </tr>
    
                        <tr>
                            <td><label for="razaMascota">Raza:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="razaMascota" name="razaMascota"<?php
                            echo"value='".$mascota[0]->getRaza()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="selectSexoMascota">Sexo:</label></td>
                            <td><select name="selectSexoMascota" id="selectSexoMascota" <?php
                            echo"value='".$mascota[0]->getSexo()."'";
                            ?> required>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select></td>
                        </tr>
    
                        <tr>
                            <td><label for="colorMascota">Color:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="colorMascota" name="colorMascota"  <?php
                            echo"value='".$mascota[0]->getColor()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="codigoChipMascota">Código chip:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="codigoChipMascota" name="codigoChipMascota"  <?php
                            echo"value='".$mascota[0]->getCodigoChip()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="fechaNacimientoMascota">Fecha de nacimiento:</label></td>
                            <td><input type="date" id="fechaNacimientoMascota" name="fechaNacimientoMascota"  <?php
                            echo"value='".$mascota[0]->getFechaNacimiento()."'";
                            ?>></td>
                        </tr>
    
                        <tr>
                            <td><label for="selectOperadoMascota">Operado:</label></td>
                            <td><select name="selectOperadoMascota" id="selectOperadoMascota"  <?php
                            echo"value='".$mascota[0]->getOperado()."'";
                            ?> required>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                                <option value="?">?</option>
                            </select></td>
                        </tr>
    
                    </table>
                </fieldset>
                <?php
                    echo"<input id='edit' name='edit' type='hidden' value='s'>";
                    echo"<input id='idTitular' name='idTitular' type='hidden' value='".$idTitular."'>";
                    echo"<input id='idMascota' name='idMascota' type='hidden' value='".$mascota[0]->getID()."'>";

                    
                ?>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>