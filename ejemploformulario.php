<?php
//Obtener los datos del formulario
print "<pre>";
print_r($_REQUEST);
print "</pre>";

echo ".......<br>";
if (isset($_REQUEST['nombre'])) {
    $nombre = $_REQUEST['nombre'];
    echo "El nombre es: $nombre <br>";
} else {
    echo "No se ha enviado el nombre <br>";
}