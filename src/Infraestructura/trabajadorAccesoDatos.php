<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class TrabajadorAccesoDatos
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
		$consulta = mysqli_prepare($conexion, "SELECT ID, nombre, apellidos, trabajo, n_colegiado, fecha_alta, num_contacto, id_usuario FROM T_Trabajador ");
        
        $consulta->execute();
        $result = $consulta->get_result();

		$trabajadores =  array();

        while ($myrow = $result->fetch_assoc()){
			
			array_push($trabajadores,$myrow);
        }
		return $trabajadores;
	}
}