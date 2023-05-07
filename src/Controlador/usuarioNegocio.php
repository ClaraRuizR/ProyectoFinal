<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("../Modelo/usuarioModelo.php");

class UsuarioControlador
{

	function __construct()
    {
    }
    
    function verificar($usuario, $clave){
        $usuariosDAL = new UsuarioModelo();
        $res = $usuariosDAL->verificar($usuario,$clave);
        return $res;
    }
}
