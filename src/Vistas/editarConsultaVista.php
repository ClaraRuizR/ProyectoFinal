<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Controlador/consultaControlador.php");
require_once("../Controlador/trabajadorControlador.php");


$idConsulta = $_GET["idConsulta"];

$consultasControlador = new ConsultaControlador();
$trabajadoresControlador = new TrabajadorControlador();

$consulta = $consultasControlador->buscarConsultasporId($idConsulta);
$veterinario = $trabajadoresControlador->buscarTrabajadorPorId($consulta->getIdVeterinario());

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nuevaConsulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Editar consulta</title>
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
            <h1>Editar consulta</h1>
            <form action="consultaRegistrada.php" method="POST">
                <fieldset>

                    <table cellspacing="0">
                        <legend>Anamnesis</legend>
                        <tr>
                            <td><label for="veterinario">Veterinario:</label></td>
                            <?php
                            echo"<td><input placeholder='Escribe aquí...' type='text' id='veterinario' name='veterinario' value='".$veterinario->getID()."' required></td>";
                            // echo"<td><input placeholder='Escribe aquí...' type='text' id='veterinario' name='veterinario' value='".$veterinario->getNombre()." ".$veterinario->getApellidos()."' required></td>";
                            ?>
                        </tr>
                        <tr>
                            <td><label for="fechaConsulta">Fecha:</label></td>
                            <?php
                            echo"<td><input type='date' id='fechaConsulta' name='fechaConsulta' value='".$consulta->getFecha()."'></td>";
                            ?>
                        </tr>
                        <tr>
                            <td><label for="motivoConsulta">Motivo consulta:</label></td>
                            
                            <td><textarea placeholder="Escribe aquí..." id="motivoConsulta" cols="50" rows="5" name="motivoConsulta"><?php print($consulta->getMotivoConsulta())?></textarea></td>
                           
                        </tr>
                        <tr>
                            <td><label for="antecedentesConsulta">Antecedentes:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="antecedentesConsulta" cols="50" rows="5" name="antecedentesConsulta"><?php print($consulta->getAntecedentes())?>
                            </textarea></td>
                        </tr>
                    </table>

                </fieldset>

                <fieldset>
                    
                    <table cellspacing="0">
                        <legend>EFG</legend>
                        <tr>
                            <td><label for="pesoMascotaConsulta">Peso (kg):</label></td>
                                <?php
                                echo"<td><input type='number' step='any' min='0' id='pesoMascotaConsulta' name='pesoMascotaConsulta' value='".$consulta->getPeso()."'></td>";
                                ?>
                        </tr>
                        <tr>
                            <td><label for="temperaturaMascotaConsulta">Temperatura (ºC):</label></td>
                                <?php
                                echo"<td><input type='number' step='any' min='0' id='temperaturaMascotaConsulta' name='temperaturaMascotaConsulta' value='".$consulta->getTemperatura()."'></td>";
                                ?>
                        </tr>
                        <tr>
                            <td><label for="exploracionConsulta">Exploración física:</label></td>
                            
                            <td><textarea placeholder="Escribe aquí..." id="exploracionConsulta" cols="50" rows="5" name="exploracionConsulta"><?php print($consulta->getExploracionFisica())?>
                            </textarea></td>
                            
                        </tr>
                        <tr>
                            <td><label for="getDiagnostico">Diagnóstico:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="diagnosticoConsulta" cols="50" rows="5" name="diagnosticoConsulta"><?php print($consulta->getAntecedentes())?>
                            </textarea></td>
                        </tr>
                    </table>
                    
                </fieldset>

                <fieldset>
                    <legend>Procedimientos/Medicación</legend>
                    <table cellspacing="0">
                        <tr>
                            <td><label for="actuacionConsulta">Actuación:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="actuacionConsulta" cols="50" rows="5" name="actuacionConsulta"><?php print($consulta->getActuacion())?>
                            </textarea></td>
                        </tr>
                        <tr>
                            <td><label for="procedimientosConsulta">Procedimientos:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="procedimientosConsulta" cols="50" rows="5" name="procedimientosConsulta"><?php print($consulta->getProcedimientos())?> 
                            </textarea></td>            
                        </tr>
                        <tr>
                            <td><label for="anestesiaConsulta">Anestesia:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="anestesiaConsulta" cols="50" rows="5" name="anestesiaConsulta"><?php print($consulta->getAnestesia())?>
                            </textarea></td>                     
                        </tr>
                        <tr>
                            <td><label for="medicacionInyectadaConsulta">Medicación inyectada:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="medicacionInyectadaConsulta" cols="50" rows="5" name="medicacionInyectadaConsulta"><?php print($consulta->getMedicacionInyectada())?>
                            </textarea></td>
                                                     
                        </tr>
                        <tr>
                            <td><label for="medicamentosCedidosConsulta">Medicamentos cedidos:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="medicamentosCedidosConsulta" cols="50" rows="5" name="medicamentosCedidosConsulta"><?php print($consulta->getMedicamentosCedidos())?>
                            </textarea></td>
                        </tr>
                        <tr>
                            <td><label for="dietasConsulta">Dietas:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="dietasConsulta" cols="50" rows="5" name="dietasConsulta"><?php print($consulta->getDietas())?>
                            </textarea></td>
                                             
                        </tr>
                        <tr>
                            <td><label for="tiendaConsulta">Tienda:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="tiendaConsulta" cols="50" rows="5" name="tiendaConsulta"><?php print($consulta->getTienda())?>
                            </textarea></td>
                        </tr>
                        <tr>
                            <td><label for="otrosConsulta">Otros:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="otrosConsulta" cols="50" rows="5" name="otrosConsulta"><?php print($consulta->getOtros())?>
                            </textarea></td>        
                        </tr>
                    </table>
                </fieldset>

                <fieldset>
                    
                    <legend>Multimedia</legend>
                    <table cellspacing="0">
                        <tr>
                            <td><label for="fotosConsulta">Fotos/Videos/Ecografías:</label></td>
                            <td><input type="file" id="fotosConsulta" name="fotosConsulta"></td>
                        </tr>
                        <tr>
                            <td><label for="analiticasConsulta">Analíticas:</label></td>
                            <td><input type="file" id="analiticasConsulta" name="analiticasConsulta"></td>
                        </tr>
                    </table>
                    
                </fieldset>
                <?php
                    echo"<input id='mascota' name='mascota' type='hidden' value='".$consulta->getIdMascota()."'>";
                    echo"<input id='idConsulta' name='idConsulta' type='hidden' value='".$consulta->getID()."'>";
                    echo"<input id='edit' name='edit' type='hidden' value='s'>";
                ?>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>