<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

$idMascota = $_GET["idMascota"];

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
    <title>Nueva consulta</title>
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
            <h1>Nueva consulta</h1>
            <form action="consultaRegistrada.php" method="POST">
                <fieldset>

                    <table cellspacing="0">
                        <legend>Anamnesis</legend>
                        <tr>
                            <td><label for="veterinario">Veterinario:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="veterinario" name="veterinario" required></td>
                        </tr>
                        <tr>
                            <td><label for="fechaConsulta">Fecha:</label></td>
                            <td><input type="date" id="fechaConsulta" name="fechaConsulta"></td>
                        </tr>
                        <tr>
                            <td><label for="motivoConsulta">Motivo consulta:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="motivoConsulta" cols="50" rows="5" name="motivoConsulta"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="antecedentesConsulta">Antecedentes:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="antecedentesConsulta" cols="50" rows="5" name="antecedentesConsulta"></textarea></td>
                        </tr>
                    </table>

                </fieldset>

                <fieldset>
                    
                    <table cellspacing="0">
                        <legend>EFG</legend>
                        <tr>
                            <td><label for="pesoMascotaConsulta">Peso (kg):</label></td>
                            <td><input type="number" step="any" min="0" id="pesoMascotaConsulta" name="pesoMascotaConsulta"></td>
                        </tr>
                        <tr>
                            <td><label for="temperaturaMascotaConsulta">Temperatura (ºC):</label></td>
                            <td><input type="number" step="any" min="0" id="temperaturaMascotaConsulta" name="temperaturaMascotaConsulta"></td>
                        </tr>
                        <tr>
                            <td><label for="exploracionConsulta">Exploración física:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="exploracionConsulta" cols="50" rows="5" name="exploracionConsulta"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="diagnosticoConsulta">Diagnóstico:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="diagnosticoConsulta" cols="50" rows="5" name="diagnosticoConsulta"></textarea></td>
                        </tr>
                    </table>
                    
                </fieldset>

                <fieldset>
                    <legend>Procedimientos/Medicación</legend>
                    <table cellspacing="0">
                        <tr>
                            <td><label for="actuacionConsulta">Actuación:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="actuacionConsulta" cols="50" rows="5" name="actuacionConsulta"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="procedimientosConsulta">Procedimientos:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="procedimientosConsulta" cols="50" rows="5" name="procedimientosConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="anestesiaConsulta">Anestesia:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="anestesiaConsulta" cols="50" rows="5" name="anestesiaConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="medicacionInyectadaConsulta">Medicación inyectada:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="medicacionInyectadaConsulta" cols="50" rows="5" name="medicacionInyectadaConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="medicamentosCedidosConsulta">Medicamentos cedidos:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="medicamentosCedidosConsulta" cols="50" rows="5" name="medicamentosCedidosConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="dietasConsulta">Dietas:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="dietasConsulta" cols="50" rows="5" name="dietasConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="tiendaConsulta">Tienda:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="tiendaConsulta" cols="50" rows="5" name="tiendaConsulta"></textarea></td>                        
                        </tr>
                        <tr>
                            <td><label for="otrosConsulta">Otros:</label></td>
                            <td><textarea placeholder="Escribe aquí..." id="otrosConsulta" cols="50" rows="5" name="otrosConsulta"></textarea></td>                        
                        </tr>
                    </table>
                </fieldset>
                <?php
                    echo"<input id='mascota' name='mascota' type='hidden' value='$idMascota'>";
                    echo"<input id='edit' name='edit' type='hidden' value='n'>";
                ?>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>