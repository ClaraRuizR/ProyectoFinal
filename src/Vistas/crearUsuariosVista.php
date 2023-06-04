<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

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
    <title>Nuevo usuario</title>
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
            <h1>Alta: nuevo usuario</h1>
            <form action="usuarioRegistradoVista.php" method="POST">
                <fieldset>
                    <legend>Información de titular</legend>
                    <table cellspacing="0">
                    
                        <tr>
                            <td><label for="nombreUsuario">Nombre:</label></td>
                            <td><input type="text" placeholder="Escribe aquí..." id="nombreUsuario" name="nombreUsuario" required></td>
                        </tr>
    
                        <tr>
                            <td><label for="perfil">Perfil:</label></td>
                            <td>
                                <select name="perfil" id="perfil" required>
                                    <option value="Veterinario/a">Veterinario/a</option>
                                    <option value="Administrador/a">Administrador/a</option>
                                    <option value="ACV">ACV</option>
                                    <option value="Peluquero/a">Peluquero/a</option>
                                </select></td>
                        </tr>
                        
                        <tr>
                            <td><label for="clave">Contraseña:</label></td>
                            <td><input type="password" placeholder="Escribe aquí..." id="clave" name="clave"></td>
                        </tr>
    
                        <tr>
                            <td><label for="idTrabajador">Código de trabajador:</label></td>
                            <td><input type="number" placeholder="Escribe aquí..." id="idTrabajador" name="idTrabajador"></td>
                        </tr>
    
                    </table>
                </fieldset>
                <?php
                    echo"<input id='edit' name='edit' type='hidden' value='n'>";
                ?>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>