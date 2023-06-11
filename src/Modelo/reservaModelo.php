<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class ReservaModelo{
	
	function __construct(){
    }

	function obtener(){
		$conexion = mysqli_connect('localhost','Clara','2223');

		if (mysqli_connect_errno()){
				
			echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}

 		mysqli_select_db($conexion, 'veterinaria');

		$query = mysqli_prepare($conexion, "SELECT ID, id_mascota, tipo_reserva, sala, fecha, hora_inicio, num_contacto FROM T_Reserva");
        
        $query->execute();
        $result = $query->get_result();

		$reservas =  array();

        while ($myrow = $result->fetch_assoc()){

			array_push($reservas,$myrow);
        }
		return $reservas;
	}

	function crearReserva($idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto){

        $conexion = mysqli_connect('localhost','Clara','2223');

		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$sanitizedIdMascota = mysqli_real_escape_string($conexion, $idMascota);
		$sanitizedTipoReserva = mysqli_real_escape_string($conexion, $tipoReserva);
		$sanitizedSala = mysqli_real_escape_string($conexion, $sala);
		$sanitizedFecha = mysqli_real_escape_string($conexion, $fecha);
		$sanitizedHoraInicio = mysqli_real_escape_string($conexion, $horaInicio);
		$sanitizedNumContacto = mysqli_real_escape_string($conexion, $numContacto);

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Reserva (id_mascota, tipo_reserva, sala, fecha, hora_inicio, num_contacto) VALUES (?, ?, ?, ?, ?, ?);");

		$consulta->bind_param("ssssss", $sanitizedIdMascota, $sanitizedTipoReserva, $sanitizedSala, $sanitizedFecha, $sanitizedHoraInicio, $sanitizedNumContacto);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Reserva guardada con éxito.";
		}

		return $mensaje;
    }

	function crearReservaTrabajador($idReserva, $idTrabajador){

        $conexion = mysqli_connect('localhost','Clara','2223');

		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$sanitizedIdReserva = mysqli_real_escape_string($conexion, $idReserva);
		$sanitizedIdTrabajador = mysqli_real_escape_string($conexion, $idTrabajador);

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Reserva_Trabajador (id_reserva, id_trabajador) VALUES (?, ?);");

		$consulta->bind_param("ss", $sanitizedIdReserva, $sanitizedIdTrabajador);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Reserva guardada con éxito.";
		}

		return $mensaje;
    }
}