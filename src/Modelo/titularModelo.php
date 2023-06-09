<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class TitularModelo{
	
	function __construct(){
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre, DNI, domicilio, codigo_postal, num_contacto, fecha_alta FROM T_Titular ");
        
        $consulta->execute();
        $result = $consulta->get_result();

		$titulares =  array();

        while ($myrow = $result->fetch_assoc()){
			
			array_push($titulares,$myrow);
        }
		return $titulares;
	}

	function obtenerConFiltros($filtro, $textoFiltro){

		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		 $sanitizedFiltro = mysqli_real_escape_string($conexion, $filtro);
		 $sanitizedTextoFiltro = mysqli_real_escape_string($conexion, $textoFiltro);

		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre, DNI, domicilio, codigo_postal, num_contacto, fecha_alta FROM T_Titular WHERE $sanitizedFiltro LIKE '%$sanitizedTextoFiltro%'");

		$consulta->execute();
		$result = $consulta->get_result();

		$titulares =  array();

        while ($myrow = $result->fetch_assoc()){
			array_push($titulares, $myrow);

        }
		return $titulares;
	}

	function crearFicha($nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular){

		$fechaAlta = date("Y-m-d");

        $conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Titular(nombre, DNI, domicilio, codigo_postal, num_contacto, fecha_alta) VALUES (?, ?, ?, ?, ?, ?);");

		$consulta->bind_param("ssssss", $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular, $fechaAlta);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Titular guardado con éxito.";
		}

		return $mensaje;
    }

	function editarFicha($idTitular, $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular){

        $conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta = mysqli_prepare($conexion, "UPDATE T_Titular SET nombre = ?, DNI = ?, domicilio = ?, codigo_postal = ?, num_contacto = ? WHERE ID = ?;");

		$consulta->bind_param("ssssss", $nombre, $dniTitular, $domicilioTitular, $codigoPostalTitular, $numeroContactoTitular, $idTitular);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Titular guardado con éxito.";
		}

		return $mensaje;
    }
}