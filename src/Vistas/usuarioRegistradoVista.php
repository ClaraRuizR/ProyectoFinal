<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/usuarioServicio.php");

$nombre = $_POST["nombreUsuario"];
$perfil = $_POST["perfil"];
$clave = $_POST["clave"];
$idTrabajador = intval($_POST["idTrabajador"]);

$usuarioServicio = new UsuarioServicio();
$respuesta= $usuarioServicio->crear($nombre, $perfil, $clave, $idTrabajador);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/nuevaFicha.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Mascota registrada</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <a href="menuAdministradorVista.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>

        <div class="cuerpo">

            <div class="mensaje">
                <?php
                echo"$respuesta";
                echo"<a id='enlaceFichaCreada' href='menuAdministradorVista.php'>Volver al menú de administrador</a>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>