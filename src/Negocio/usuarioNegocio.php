<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("../Infraestructura/usuarioAccesoDatos.php");

class UsuarioNegocio
{

	function __construct()
    {
    }
    
    function verificar($usuario, $clave){
        $usuariosDAL = new UsuarioAccesoDatos();
        $res = $usuariosDAL->verificar($usuario,$clave);
        return $res;
    }
}
