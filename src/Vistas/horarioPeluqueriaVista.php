<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/reservaServicio.php");
require_once("../Controlador/mascotasControlador.php");

$mascotasControlador = new MascotasControlador();
$reservasServicio = new ReservaServicio();

$primerDia = strtotime("this week");
$ultimoDia = strtotime("friday -1 week");

$contadorSemana = intval($_GET["contadorSemana"]);

$hoy = date("Y-m-d");

$semana = [' ', date('Y-m-d',strtotime("monday -$contadorSemana week")), date('Y-m-d',strtotime("tuesday -$contadorSemana week")), date('Y-m-d',strtotime("wednesday -$contadorSemana week")), date('Y-m-d',strtotime("thursday -$contadorSemana week")), date('Y-m-d',strtotime("friday -$contadorSemana week"))];

$horario = ['10:00:00', '11:00:00', '12:00:00', '13:00:00', '15:00:00', '16:00:00'];

$arrayReservas = $reservasServicio->buscarReservas(date('Y-m-d', strtotime("monday -$contadorSemana week")), date('Y-m-d', strtotime("friday -$contadorSemana week")), "Peluquería");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/peluqueria.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Peluquería</title>
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
            <h1>Peluquería</h1>

            <fieldset>
                <?php
                echo"<legend>Semana ".date('d', strtotime("monday -$contadorSemana week")). " - ".date('d', strtotime("friday -$contadorSemana week"))."</legend>";
                $semanaMas = $contadorSemana - 1;
                $semanaMenos = $contadorSemana + 1;
                echo"<a href='horarioPeluqueriaVista.php?contadorSemana=".$semanaMas."'>Semana siguiente</a><br>";
                echo"<a href='horarioPeluqueriaVista.php?contadorSemana=".$semanaMenos."'>Semana anterior</a>";

                echo"<table  id='tablaDias'>";

                    echo"<tr>";
                    foreach ($semana as $dia){
                        echo"<td>$dia</td>";
                    }
                    echo"</tr>";

                    ?>
                </table>
                <table >
                
                    <?php
                        array_shift($semana);
                        foreach($horario as $hora){
                            echo"<tr><th id='tablaHoras'>".substr($hora, 0, 5) ."</th>";
                            
                            foreach ($semana as $dia){
                                echo"<td>";
                                $reserva = $reservasServicio->colocarReserva($arrayReservas, $dia, $hora);
                                if($reserva != "-"){
                                    $idMascota = $reserva->getIdMascota();
                                    $mascota = $mascotasControlador->obtener('ID', $idMascota);
                                    echo"Reserva: ".$mascota[0]->getNombre();
                                    
                                } else{
                                    print($reserva);
                                }

                                echo"</td>";
                            }
                            echo"</tr>";
                        }
                    ?>

                </table>
            </fieldset>
            <fieldset>
                <legend>Crear nueva reserva</legend>
                <form action="reservaRegistradaVista.php" method='POST'>
                    <label for="idMascota">Mascota: </label>
                    <input type="text" id='idMascota' name='idMascota' required>
                    <br>
                    <label for="sala">Sala: </label>
                    <select name="sala" id="sala" required>
                        <option value="Peluquería">Peluquería</option>
                    </select>

                    <label for="tipoReserva">TipoReserva: </label>
                    <select name="tipoReserva" id="tipoReserva" required>
                        <option value="Peluquería">Peluquería</option>
                    </select>

                    <label for="fechaReserva">Fecha: </label>
                    <?php
                        echo"<input type='date' id='fechaReserva' name='fechaReserva' min='".$hoy."' required>";
                    ?>
                    <label for="horaInicio">Hora: </label>
                    <input type="time" id='horaInicio' name='horaInicio' min='10:00' max='16:00' step="3600" required>

                    <label for="numeroContacto">Número de contacto: </label>
                    <input type="number" id='numeroContacto' name='numeroContacto' required>

                    <input type="submit" value="Enviar" id="boton">

                </form>
            </fieldset>

            <br><br>
        </div>
    </div>
</body>
</html>