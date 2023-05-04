<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class mascotasAccesoDatos
{
	
	function __construct()
	{
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre FROM T_Mascota ");
        $consulta->execute();
        $result = $consulta->get_result();

		$mascotas =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($mascotas,$myrow);

        }
		return $mascotas;
	}
}

$mascotas = new mascotasAccesoDatos();
$arrayMascotas = $mascotas->obtener();
var_dump($arrayMascotas);