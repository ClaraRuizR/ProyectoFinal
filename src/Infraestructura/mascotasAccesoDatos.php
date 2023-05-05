<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class MascotasAccesoDatos
{
	
	function __construct(){
    }

	function obtener($filtro, $textoFiltro){

		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta1 = mysqli_prepare($conexion, "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota WHERE $filtro = '$textoFiltro'");

		$consulta2 = mysqli_prepare($conexion, "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota");

		if($filtro == -1 || $textoFiltro == -1){
			$consulta2->execute();
			$result = $consulta2->get_result();
		} else{
			$consulta1->execute();
			$result = $consulta1->get_result();
		}

		$mascotas =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($mascotas,$myrow);

        }
		return $mascotas;
	}
}