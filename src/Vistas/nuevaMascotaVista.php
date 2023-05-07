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
    <title>Nueva ficha de mascota</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <img src="../../img/logo.png" alt="logo">
            </div>
            <div class="nav">
                <a href=''>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1>Alta: nueva mascota</h1>
            <form action="mascotaRegistrada.php" method="POST">
                <fieldset>
                    <legend>Información de mascota</legend>
                    <table cellspacing="0">
                    
                        <tr>
                            <td><label for="pasaporteMascota">Pasaporte:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="pasaporteMascota" name="pasaporteMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="nombreMascota">Nombre:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="nombreMascota" name="nombreMascota" required></td>
                        </tr>
                        
                        <tr>
                            <td><label for="titularMascota">Titular:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="titularMascota" name="titularMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="selectEspecieMascota">Especie:</label></td>
                            <td><select name="selectEspecieMascota" id="selectEspecieMascota" required>
                                <option value="FEL">FEL</option>
                                <option value="CAN">CAN</option>
                                <option value="Otros">Otros</option>
                            </select></td>
                        </tr>
    
                        <tr>
                            <td><label for="razaMascota">Raza:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="razaMascota" name="razaMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="selectSexoMascota">Sexo:</label></td>
                            <td><select name="selectSexoMascota" id="selectSexoMascota" required>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select></td>
                        </tr>
    
                        <tr>
                            <td><label for="colorMascota">Color:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="colorMascota" name="colorMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="codigoChipMascota">Código chip:</label></td>
                            <td><input placeholder="Escribe aquí..." type="text" id="codigoChipMascota" name="codigoChipMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="fechaNacimientoMascota">Fecha de nacimiento:</label></td>
                            <td><input type="date" id="fechaNacimientoMascota" name="fechaNacimientoMascota"></td>
                        </tr>
    
                        <tr>
                            <td><label for="selectOperadoMascota">Operado:</label></td>
                            <td><select name="selectOperadoMascota" id="selectOperadoMascota" required>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                                <option value="?">?</option>
                            </select></td>
                        </tr>
    
                    </table>
                </fieldset>
                <br><br>
                <input type="submit" value="Enviar" id="botonEnviar">
            </form>
        </div>
    </div>
</body>
</html>