<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class MascotasModelo{
	
	function __construct(){
    }

	function obtener($filtro, $textoFiltro){

		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$sanitizedFiltro = mysqli_real_escape_string($conexion, $filtro);
		$sanitizedTextoFiltro = mysqli_real_escape_string($conexion, $textoFiltro);

		$consulta1 = mysqli_prepare($conexion, "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota WHERE $sanitizedFiltro LIKE '$sanitizedTextoFiltro%'");

		$consulta2 = mysqli_prepare($conexion, "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota");

		if($filtro == 0 || $textoFiltro == 0){
			$consulta2->execute();
			$result = $consulta2->get_result();
		} else{
			$consulta1->execute();
			$result = $consulta1->get_result();
		}

		$mascotas =  array();

        while ($myrow = $result->fetch_assoc()){
			array_push($mascotas,$myrow);

        }
		return $mascotas;
	}

	function crearFicha($pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado){

		$fechaAlta = date("Y-m-d");

        $conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Mascota(pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

		$consulta->bind_param("sssssssssss", $pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado, $fechaAlta);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Mascota guardada con éxito.";
		}

		return $mensaje;
    }

	function editarFicha($idMascota, $pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado){

        $conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta = mysqli_prepare($conexion, "UPDATE T_Mascota SET pasaporte = ?, nombre = ?, id_titular = ?, especie = ?, raza = ?, sexo = ?, color = ?, codigo_chip = ?, fecha_nacimiento = ?, operado = ? WHERE ID = ?;");

		$consulta->bind_param("sssssssssss", $pasaporte, $nombre, $titular, $especie, $raza, $sexo, $color, $codigoChip, $fechaNacimiento, $operado, $idMascota);
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Mascota guardada con éxito.";
		}

		return $mensaje;
    }
}