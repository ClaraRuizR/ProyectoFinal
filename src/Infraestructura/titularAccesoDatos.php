<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class TitularAccesoDatos
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
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre, DNI, domicilio, codigo_postal, num_contacto, fecha_alta FROM T_Titular ");
        
        $consulta->execute();
        $result = $consulta->get_result();

		$titulares =  array();

        while ($myrow = $result->fetch_assoc()){
			
			array_push($titulares,$myrow);
        }
		return $titulares;
	}
}