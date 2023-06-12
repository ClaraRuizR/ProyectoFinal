<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require_once("../Servicio/titularServicio.php");
$titularServicio = new TitularServicio();

 if ($_GET["filtros"] == 'si'){
     $filtro = $_POST["selectFiltros"];
     $textoFiltro = $_POST["textoFiltro"];

 }else{
    $filtro = 0;
    $textoFiltro = 0;
 }

$apiUrl = "http://127.0.0.1:5000/listaMascotas/$filtro/$textoFiltro";

$metodo = "GET";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);

$response = curl_exec($ch);

curl_close($ch);

if(curl_errno($ch)){
    echo 'Error en la solicitud cURL: ' . curl_error($ch);
}

if ($response) {
    $listaMascotas = json_decode($response, true);
} else {
    echo 'Error en la respuesta.';
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
                <a href="menuInicioVeterinaria.php"><img src="../../img/logo.png" alt="logo"></a>
            </div>
            <div class="nav">
                <a href='logOutVista.php'>Cerrar sesión</a>
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
                    $titular = $titularServicio->buscarTitularPorId($mascota['id_titular']);

                    echo"<tr>";
                    echo"<td><div id='dato'>";
                    print($mascota['nombre']);
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota['especie']);
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota['sexo']);
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota['pasaporte']);
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($titular->getNombre());
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    print($mascota['fecha_alta']);
                    echo"</div></td>";

                    echo"<td><div id='dato'>";
                    echo"<a href='fichaMascotaVista.php?id=".$mascota['ID']."'>Ver Ficha</a>";
                    echo"</div></td></tr>";
                }

                ?>
                
            </table>
            <div class="enlacePie">
                <a href='nuevaMascotaVista.php?idTitular=0'>Nueva mascota</a>
            </div>
        </div>
        <footer></footer>
    </div>  
</body>
</html>
