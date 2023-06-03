<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Controlador/mascotasControlador.php");
require_once("../Controlador/titularControlador.php");

$mascotasControlador = new MascotasControlador();
$titularesControlador = new TitularControlador();

if ($_GET["filtros"] == 'si'){
    $filtro = $_POST["selectFiltros"];
    $textoFiltro = $_POST["textoFiltro"];
    $listaMascotas = $mascotasControlador->obtener($filtro, $textoFiltro);
}else{
    $listaMascotas = $mascotasControlador->obtener(-1, -1);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/listaMascotas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&display=swap+Arimo&family=EB+Garamond&display=swap" rel="stylesheet">
    <title>Buscar mascota</title>
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
            <h1>Buscar fichas de mascota</h1>
            <div id="filtros">
                <form action="listaMascotasVista.php?filtros=si" method="POST">
                    <label for="selectFiltros">Filtrar por:</label>
                    <select name="selectFiltros" id="selectFiltros">
                        <option value="nombre">Nombre</option>
                        <option value="especie">Especie</option>
                        <option value="sexo">Sexo</option>
                        <option value="pasaporte">Pasaporte</option>
                        <option value="id_titular">Titular</option>
                        <option value="fecha_alta">Fecha Alta</option>
                    </select>
                    <label for="filtro"></label>
                    <input type="text" name='textoFiltro' placeholder="Escribe aquí...">
                    <input type="submit" value="Filtrar">
                </form>
                <br><a href="listaMascotasVista.php?filtros=no">Borrar filtros</a>

            </div>
            <table>

                <tr>
                    <th><div id='dato'>Nombre</div></th>
                    <th><div id='dato'>Especie</div></th>
                    <th><div id='dato'>Sexo</div></th>
                    <th><div id='dato'>Pasaporte</div></th>
                    <th><div id='dato'>Titular</div></th>
                    <th><div id='dato'>Fecha Alta</div></th>
                    <th><div id='dato'>Ver Ficha</div></th>
                </tr>

                <?php

                foreach($listaMascotas as $mascota){

                    $titular = $titularesControlador->buscarTitularPorId($mascota->getTitular());

                    echo"<tr>";
                    echo"<td><div id='dato'>";
                    print($mascota->getNombre());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota->getEspecie());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota->getSexo());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota->getPasaporte());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getNombre());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota->getFechaAlta());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    echo"<a href='fichaMascotaVista.php?id=".$mascota->getID()."'>Ver Ficha</a>";
                    echo"</div></td></tr>";
                    
                }

                ?>
                
            </table>
            <div class="enlacePie"><a href='nuevaMascotaVista.php?idTitular=0'>Nueva mascota</a>
                <br><a href='nuevoTitularVista.php'>Nuevo titular</a>
            </div>
        </div>
        <footer></footer>
    </div>  
</body>
</html>
