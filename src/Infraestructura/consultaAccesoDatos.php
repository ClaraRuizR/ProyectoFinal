<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class ConsultaAccesoDatos
{
	
	function __construct(){
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$query = mysqli_prepare($conexion, "SELECT ID, id_mascota, id_veterinario, fecha, motivo_consulta, peso, temperatura, exploracion_fisica, diagnostico, actuacion, procedimientos, anestesia, medicacion_inyectada, medicamentos_cedidos, dietas, tienda, otros FROM T_Consulta");
        
        $query->execute();
        $result = $query->get_result();

		$consultas =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($consultas,$myrow);

        }
		return $consultas;
	}
}