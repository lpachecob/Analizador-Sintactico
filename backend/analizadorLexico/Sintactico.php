<?php
include 'backend/analizadorLexico/palabrasClave.php';
$fp = fopen("backend/files/" . $nombre, "r");

$txt = '';
while (!feof($fp)) $txt .= fgets($fp);
fclose($fp);

$palabras = explode(" ", preg_replace("/[\r\n|\n|\r]+/", " ", trim($txt)));

$vosActiva = true;
$palabraVosPasiva = array(null);

foreach ($palabras as $clave => $valor) {
    //echo $valor;
    foreach ($vosPasiva as $key => $busqueda) {

        if ($valor == $busqueda) {
            echo 'Se encontro una oracion en voz pasiva';
            echo '<br>';
            echo 'La coincidencia encontrada es: "' . $valor . '"';
            array_push($palabraVosPasiva, $valor);
            echo '<br>';
            echo '<br>';
            $vosActiva = false;
        }
    }
}
if ($vosActiva) {
    echo 'La oración está en voz Activa';
}

