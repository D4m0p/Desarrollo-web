<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ejemplo</title>
<style>
    body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
    .caja { background: #fff; border: 1px solid #cfd8dc; border-radius: 6px; padding: 18px; max-width: 420px; }
    table { border-collapse: collapse; width: 100%; }
    td { padding: 5px 4px; border-bottom: 1px solid #eceff1; vertical-align: top; }
    td.etiqueta { font-weight: bold; width: 45%; color: #37474f; }
</style>
</head>
<body>
    <h1>Ejemplo simple.</h1>
    Primer ejemplo de código PHP embebido dentro de código HTML.<br><br>

<div class="caja">
<?php
// Cadena de partida, con espacios de más a propósito
$cadena = "   hola Mundo desde PHP   ";

// trim() quita los espacios del inicio y del final
$limpia = trim($cadena);

// ucfirst() pone en mayúscula solo la primera letra
$capitalizada = ucfirst($limpia);

// strtoupper() y strtolower() cambian toda la cadena de caso
$enMayusculas = strtoupper($limpia);
$enMinusculas = strtolower($limpia);

// strlen() cuenta los caracteres de la cadena
$largo = strlen($limpia);

// Se guardan los pares etiqueta/valor para imprimirlos con un solo recorrido
$filas = [
    "Cadena original"      => "\"$cadena\"",
    "Sin espacios (trim)"  => "\"$limpia\"",
    "Primera en mayúscula" => $capitalizada,
    "Todo en mayúsculas"   => $enMayusculas,
    "Todo en minúsculas"   => $enMinusculas,
    "Largo (strlen)"       => "$largo caracteres",
    "Saludo"               => "Hola Mundo"
];

echo "<table>";
foreach ($filas as $etiqueta => $valor) {
    // htmlspecialchars() en la salida como buena práctica, por si la cadena
    // llegara a traer caracteres especiales de HTML
    echo "<tr><td class='etiqueta'>" . htmlspecialchars($etiqueta) . ":</td>";
    echo "<td>" . htmlspecialchars($valor) . "</td></tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
