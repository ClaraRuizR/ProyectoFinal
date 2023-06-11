<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/reservaServicio.php");
require_once("../Servicio/mascotasServicio.php");

$mascotasServicio = new MascotasServicio();
$reservasServicio = new ReservaServicio();

$contadorSemana = intval($_GET["contadorSemana"]);

$hoy = date('Y-m-d',strtotime("now"));

$semana = [' ', date('Y-m-d', strtotime("+$contadorSemana week 0 days")), date('Y-m-d', strtotime("+$contadorSemana week 1 days")), date('Y-m-d', strtotime("+$contadorSemana week 2 days")), date('Y-m-d', strtotime("+$contadorSemana week 3 days")), date('Y-m-d', strtotime("+$contadorSemana week 4 days")), date('Y-m-d', strtotime("+$contadorSemana week 5 days")), date('Y-m-d', strtotime("+$contadorSemana week 6 days"))];

$horario = ['10:00:00', '11:00:00', '12:00:00', '13:00:00', '15:00:00', '16:00:00'];

$arrayReservas = $reservasServicio->buscarReservas(date('Y-m-d', strtotime("+$contadorSemana week 0 days")), date('Y-m-d', strtotime("+$contadorSemana week 6 days")), "Consulta 1");

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
    <title>Consulta 2</title>
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
        
        <div class="cuerpo"><?php
            echo"<h1>Consulta 2</h1>";

            echo"<fieldset>";
                
                $semanaMas = $contadorSemana + 1;
                $semanaMenos = $contadorSemana - 1;
                echo"<a href='horarioConsulta2Vista.php?contadorSemana=".$semanaMas."'>Semana siguiente</a><br>";
                echo"<a href='horarioConsulta2Vista.php?contadorSemana=".$semanaMenos."'>Semana anterior</a>";

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
                                    $mascota = $mascotasServicio->obtener('ID', $idMascota);
                                    echo"Reserva: ".$mascota[0]->getNombre();
                                }else{
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
                    <label for="nombreMascota">Mascota: </label>
                    <input type="text" id='nombreMascota' name='nombreMascota' required>
                    
                    <label for="nombreMascota">ID trabajador: </label>
                    <input type="number" id='idTrabajador' name='idTrabajador' required><br>
                    <label for="sala">Sala: </label>
                    <select name="sala" id="sala" value='consulta2' required>
                        <option value="Consulta 1">Consulta 1</option>
                        <option value="Consulta 2">Consulta 2</option>
                        <option value="Peluquería">Peluquería</option>
                    </select>

                    <label for="tipoReserva">TipoReserva: </label>
                    <select name="tipoReserva" id="tipoReserva" required>
                        <option value="Veterinario">Veterinario</option>
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