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
            <div class="col">
                <?php
                //Incluimos las clases del analizador.
                include("backend/analizadorLexico/stringtokenizer.class.php");
                include("backend/analizadorLexico/lexer.class.php");
                $txt = '';

                $fp = fopen("backend/files/" . $nombre, "r");
                while (!feof($fp)) $txt .= fgets($fp);
                fclose($fp);

                echo "<b>ENTRADA (backend/files/" . $nombre . ")</b>: <BR /><PRE>" . $txt . "</PRE>";
                ?>
            </div>
            <div class="col">
                <?php $lexer = new Lexer($txt); ?>
            </div>
        </div>
    </div>
<?php
}
