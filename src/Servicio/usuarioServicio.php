<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("../Modelo/usuarioModelo.php");

class UsuarioServicio{

	function __construct(){
    }
    
    function verificar($usuario, $clave){
        $usuariosDAL = new UsuarioModelo();
        $res = $usuariosDAL->verificar($usuario,$clave);
        return $res;
    }

    function crear($usuario, $perfil, $clave, $codigo){
		$usuariosDAL = new UsuarioModelo();
        $res = $usuariosDAL->insertar($usuario, $perfil, $clave, $codigo);
        
		return $res;
	}
}
