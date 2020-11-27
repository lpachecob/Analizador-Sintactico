<?php
include 'backend/analizadorLexico/palabrasClave.php';
$fp = fopen("backend/files/" . $nombre, "r");

$txt = '';
while (!feof($fp)) $txt .= fgets($fp);
fclose($fp);

$palabras = explode(" ", preg_replace("/[\r\n|\n|\r]+/", " ", trim($txt)));

foreach ($palabras as $clave => $valor) {
    echo $valor;


    foreach ($vosPasiva as $key => $busqueda) {

        if ($valor == $busqueda) {
            echo '$ vos pasiva $';
        } else {
            
        }
    }
}
//Incluimos las clases del analizador.
