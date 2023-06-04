<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("../Controlador/mascotasControlador.php");
require_once("../Controlador/titularControlador.php");

//$mascotasControlador = new MascotasControlador();
$titularesControlador = new TitularControlador();

if ($_GET["filtros"] == 'si'){
    $filtro = $_POST["selectFiltros"];
    $textoFiltro = $_POST["textoFiltro"];

    $listaTitulares = $titularesControlador->buscarConFiltros($filtro, $textoFiltro);
}else{
    $listaTitulares = $titularesControlador->obtener();
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
    <title>Buscar titular</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="imgLogo">
                <a href="menuInicioVeterinaria.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
            </div>
        </header>
        
        <div class="cuerpo">
            <h1>Buscar fichas de titular</h1>
            <div id="filtros">
                <form action="listaTitularesVista.php?filtros=si" method="POST">
                    <label for="selectFiltros">Filtrar por:</label>
                    <select name="selectFiltros" id="selectFiltros">
                        <option value="nombre">Nombre</option>
                        <option value="DNI">DNI</option>
                        <option value="num_contacto">Número contacto</option>
                    <label for="filtro"></label>
                    <input type="text" name='textoFiltro' placeholder="Escribe aquí...">
                    <input type="submit" value="Filtrar">
                </form>
                <br><a href="listaTitularesVista.php?filtros=no">Borrar filtros</a>

            </div>
            <table>

                <tr>
                    <th><div id='dato'>Nombre</div></th>
                    <th><div id='dato'>DNI</div></th>
                    <th><div id='dato'>Domicilio</div></th>
                    <th><div id='dato'>Código postal</div></th>
                    <th><div id='dato'>Número contacto</div></th>
                    <th><div id='dato'>Fecha Alta</div></th>
                    <th><div id='dato'>Ver ficha</div></th>
                </tr>

                <?php

                foreach($listaTitulares as $titular){

                    echo"<tr>";
                    echo"<td><div id='dato'>";
                    print($titular->getNombre());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getDNI());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getDomicilio());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getCodigoPostal());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getNumContacto());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getFechaAlta());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    echo"<a href='fichaTitularVista.php?id=".$titular->getID()."'>Ver Ficha</a>";
                    echo"</div></td></tr>";
                }

                ?>
                
            </table>
            <div class="enlacePie">
                <a href='nuevoTitularVista.php'>Nuevo titular</a>
            </div>
        </div>
        <footer></footer>
    </div>  
</body>
</html>
