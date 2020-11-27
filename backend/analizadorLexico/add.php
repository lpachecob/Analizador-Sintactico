<?php
//Obtenemos la ruta actual.
$url = parse_url($_SERVER['REQUEST_URI']);

//validamos el elemento de la url que esté como parametro, en este caso todo lo que está despues del signo "?"
if (empty($url['query'])) {
    //si está vacio pedimos que se carge el archivo
    echo 'Cargar archivo';
} else {
    //si existe un parametro lo obtenemos con el metodo htmlspecialchars
    $nombre = htmlspecialchars($_GET["archivo"]);
?>
    <div class="container-fluid">

        <br />
        <div class="row">
            <div class="col-md-3">
                <form action="?archivo=source.txt" method="POST">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <button name="botoncito" id="botoncito" class="btn btn-primary" onclick="<?php
                                                                                                    if (!empty($_POST['texto'])) {
                                                                                                        $texto = $_POST['texto'];
                                                                                                        $file = fopen("backend/files/source.txt", "w");
                                                                                                        fwrite($file, $texto);
                                                                                                        fclose($file);
                                                                                                    } else {
                                                                                                        echo '2';
                                                                                                    }
                                                                                                    ?>
                        ">Enviar</button>
                        <?php
                        $fp = fopen("backend/files/" . $nombre, "r");

                        $txt = '';
                        echo '<textarea class="form-control" id="texto" name="texto" rows="5">';
                        while (!feof($fp)) $txt .= fgets($fp);
                        fclose($fp);
                        echo $txt;
                        echo '</textarea>';
                        ?>

                    </div>

                </form>

            </div>
            <div class=" col">
                <?php
                include 'backend/analizadorLexico/Sintactico.php';
                ?>
            </div>
            <div class="col">
                <?php
                include 'backend/analizadorLexico/Sugerencias.php';
                ?>
            </div>
        </div>
    <?php

}
