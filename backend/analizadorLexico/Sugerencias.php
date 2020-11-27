<?php

if ($vosActiva) {
} else {

    foreach ($palabraVosPasiva as $key => $value) {
        if ($value != "") {
            echo 'Elimina la palabra: ' . $value . ' y coloca el sustantivo en su lugar';
            echo '<br>';
        }
    }
}
