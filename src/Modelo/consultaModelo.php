<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class ConsultaModelo{
	
	function __construct(){
    }

	function obtener(){
		$conexion = mysqli_connect('localhost','Clara','2223');

		if (mysqli_connect_errno()){
				
			echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}

 		mysqli_select_db($conexion, 'veterinaria');

		$query = mysqli_prepare($conexion, "SELECT ID, id_mascota, id_veterinario, fecha, motivo_consulta, antecedentes, peso, temperatura, exploracion_fisica, diagnostico, actuacion, procedimientos, anestesia, medicacion_inyectada, medicamentos_cedidos, dietas, tienda, otros FROM T_Consulta");
        
        $query->execute();
        $result = $query->get_result();

		$consultas =  array();

        while ($myrow = $result->fetch_assoc()){

			array_push($consultas,$myrow);
        }
		return $consultas;
	}

	function crearConsulta($veterinario, $mascota, $motivoConsulta, $fechaConsulta, $antecedentesConsulta, $pesoMascotaConsulta, $temperaturaMascotaConsulta, $exploracionConsulta, $diagnosticoConsulta, $actuacionConsulta, $procedimientosConsulta, $anestesiaConsulta, $medicacionInyectadaConsulta, $medicamentosCedidosConsulta, $dietasConsulta, $tiendaConsulta, $otrosConsulta){


        $conexion = mysqli_connect('localhost','Clara','2223');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'veterinaria');

		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Consulta(id_mascota, id_veterinario, fecha, motivo_consulta, antecedentes, peso, temperatura, exploracion_fisica, diagnostico, actuacion, procedimientos, anestesia, medicacion_inyectada, medicamentos_cedidos, dietas, tienda, otros) VALUES ($mascota, $veterinario, '$fechaConsulta', '$motivoConsulta', '$antecedentesConsulta',$pesoMascotaConsulta, $temperaturaMascotaConsulta, '$exploracionConsulta', '$diagnosticoConsulta', '$actuacionConsulta', '$procedimientosConsulta', '$anestesiaConsulta', '$medicacionInyectadaConsulta', '$medicamentosCedidosConsulta', '$dietasConsulta', '$tiendaConsulta', '$otrosConsulta');");
		
		$result = $consulta->execute();

		if(!$result){
			$mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
	
		} else if ($result){
			$mensaje = "Consulta guardada con éxito.";
		}

		return $mensaje;
    }
}