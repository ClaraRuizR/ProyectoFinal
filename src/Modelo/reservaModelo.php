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

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Reserva (id_mascota, tipo_reserva, sala, fecha, hora_inicio, num_contacto) VALUES ($idMascota, '$tipoReserva', '$sala', '$fecha', '$horaInicio', $numContacto);");
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Reserva guardada con éxito.";
		}

		return $mensaje;
    }

	// function editarConsulta($idConsulta, $veterinario, $mascota, $motivoConsulta, $fechaConsulta, $antecedentesConsulta, $pesoMascotaConsulta, $temperaturaMascotaConsulta, $exploracionConsulta, $diagnosticoConsulta, $actuacionConsulta, $procedimientosConsulta, $anestesiaConsulta, $medicacionInyectadaConsulta, $medicamentosCedidosConsulta, $dietasConsulta, $tiendaConsulta, $otrosConsulta){


    //     $conexion = mysqli_connect('localhost','Clara','2223');
	// 	if (mysqli_connect_errno()){
	// 			echo "Error al conectar a MySQL: ". mysqli_connect_error();
	// 	}
 	// 	mysqli_select_db($conexion, 'veterinaria');

	// 	$consulta = mysqli_prepare($conexion, "UPDATE T_Consulta SET id_veterinario = $veterinario, motivo_consulta = '$motivoConsulta', fecha = '$fechaConsulta', antecedentes = '$antecedentesConsulta', peso = $pesoMascotaConsulta, temperatura = $temperaturaMascotaConsulta, exploracion_fisica = '$exploracionConsulta', diagnostico = '$diagnosticoConsulta', actuacion = '$actuacionConsulta', procedimientos = '$procedimientosConsulta', anestesia = '$anestesiaConsulta', medicacion_inyectada = '$medicacionInyectadaConsulta', medicamentos_cedidos = '$medicamentosCedidosConsulta', dietas = '$dietasConsulta', tienda = '$tiendaConsulta', otros = '$otrosConsulta' WHERE ID = $idConsulta;");

		
	// 	$result = $consulta->execute();

	// 	if(!$result){
	// 		$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
	// 	} else if ($result){
	// 		$mensaje = "Consulta guardada con éxito.";
	// 	}

	// 	return $mensaje;
    // }
}