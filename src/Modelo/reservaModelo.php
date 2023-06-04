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

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Reserva (id_mascota, tipo_reserva, sala, fecha, hora_inicio, num_contacto) VALUES (?, ?, ?, ?, ?, ?);");

		$consulta->bind_param("ssssss", $idMascota, $tipoReserva, $sala, $fecha, $horaInicio, $numContacto);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Reserva guardada con éxito.";
		}

		return $mensaje;
    }
}