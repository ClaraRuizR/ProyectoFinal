<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once ("../Servicio/usuarioServicio.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuarioServicio = new UsuarioServicio();
    $perfil =  $usuarioServicio->verificar($_POST['nombre_usuario'], $_POST['clave']);

    if ($perfil==="Administrador/a"){
        session_start();
        $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
        header("Location: menuAdministradorVista.php");
        
    }else if($perfil==="Veterinario/a"||$perfil==="ACV"){
        session_start();
        $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
        header("Location: menuInicioVeterinaria.php");

    }else if($perfil==="Peluquero/a"){
        session_start();
        $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
        header("Location: horarioPeluqueriaVista.php?contadorSemana=0");
    }else{
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Registrarse</title>
</head>
<body>
    <div class="contenedor">
        <div class="fondo">
            <header>INICIO DE SESIÓN</header>
            <div class="paginaLogin">
                <div class="formulario">
                    <form class="formularioLogin" method = "POST" action = "">
                        <input class="nombre_usuario" name="nombre_usuario" type="text" placeholder="Nombre de usuario"/>
                        <input type="password" placeholder="Contraseña" id = "clave" name = "clave"/>
                        <input clas='button' type = "submit">
                    </form>
                    <?php
                    if (isset($error)) {
                        print("<div> No tienes acceso </div>");
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>