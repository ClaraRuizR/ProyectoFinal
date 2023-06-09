<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Servicio/mascotasServicio.php");

require_once("../Servicio/consultaServicio.php");
require_once("../Servicio/trabajadorServicio.php");

$mascotasServicio = new MascotasServicio();

$consultaServicio = new ConsultaServicio();
$trabajadoresServicio = new TrabajadorServicio();

$id = $_GET["id"];

$consulta = $consultaServicio->buscarConsultasporId($id);
$veterinario = $trabajadoresServicio->buscarTrabajadorPorId($consulta->getIdVeterinario());

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Visualizar consulta</title>
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
            <h1>Consulta</h1>

            <fieldset>
                <legend>Datos de cita</legend>
                <table cellspacing="0">
                
                    <tr>
                        <td>Veterinario:</td>
                        <td id="texto">
                            <?php
                            print($veterinario->getNombre()." ".$veterinario->getApellidos())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mascota:</td>
                        <?php
                        $mascota = $mascotasServicio->obtener('ID', $consulta->getIdMascota());
                            echo"<td><a href='fichaMascotaVista.php?id=".$consulta->getIdMascota()."'>";
                            print($mascota[0]->getNombre());
                            echo"</a></td>";
                        ?>
                    </tr>

                </table>
            </fieldset>

            <fieldset>

                <table cellspacing="0">
                    <legend>Anamnesis</legend>
                    <tr>
                        <td>Fecha:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getFecha())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Motivo consulta:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getMotivoConsulta())
                            ?></td>
                    </tr>
                    <tr>
                        <td>Antecedentes:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getAntecedentes())
                            ?>
                        </td>
                    </tr>
                </table>

            </fieldset>

            <fieldset>
                
                <table cellspacing="0">
                    <legend>EFG</legend>
                    <tr>
                        <td><label for="pesoMascotaConsulta">Peso (kg):</label></td>
                        <td id="texto">
                            <?php
                            print($consulta->getPeso())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Temperatura (ºC):</td>
                        <td id="texto">
                            <?php
                            print($consulta->getTemperatura())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Exploración física:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getExploracionFisica())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Diagnóstico:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getDiagnostico())
                            ?>
                        </td>
                    </tr>
                </table>
                
            </fieldset>

            <fieldset>
                <legend>Procedimientos/Medicación</legend>
                <table cellspacing="0">
                    <tr>
                        <td>Actuación:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getActuacion())
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimientos:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getProcedimientos())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Anestesia:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getAnestesia())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Medicación inyectada:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getMedicacionInyectada())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Medicamentos cedidos:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getMedicamentosCedidos())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Dietas:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getDietas())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Tienda:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getTienda())
                            ?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Otros:</td>
                        <td id="texto">
                            <?php
                            print($consulta->getOtros())
                            ?>
                        </td>                        
                    </tr>
                </table>
                <?php
                    echo"<div class='enlacePie'><a href='editarConsultaVista.php?idConsulta=".$consulta->getID()."'>Editar consulta</a></div>";
                ?>
            </fieldset>
            <br><br>
        </div>
    </div>
</body>
</html>