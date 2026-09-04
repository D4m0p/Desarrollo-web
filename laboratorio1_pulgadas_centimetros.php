<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Laboratorio 1 - Pulgadas a centímetros</title>
<style>
    body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
    .caja { background: #fff; border: 1px solid #cfd8dc; border-radius: 6px; padding: 18px; max-width: 340px; }
    input[type="text"] { width: 100%; padding: 6px; margin: 6px 0 12px 0; box-sizing: border-box;
                         border: 1px solid #b0bec5; border-radius: 4px; }
    input[type="submit"] { width: 100%; padding: 8px; border: 0; border-radius: 4px;
                           background: #37474f; color: #fff; cursor: pointer; }
    input[type="submit"]:hover { background: #263238; }
    .salida { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #e3f2fd; border-left: 4px solid #1976d2; }
    .aviso  { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #fff3e0; border-left: 4px solid #e65100; color: #bf360c; }
</style>
</head>
<body>
<h1>Convertir pulgadas a centímetros</h1>
<p>1 pulgada = 2.54 centímetros.</p>

<div class="caja">
<form method="post" action="">
    <label for="pulgadas">Leer las pulgadas:</label>
    <input type="text" name="pulgadas" id="pulgadas">
    <input type="submit" value="Convertir">
</form>
</div>

<?php
// Factor de conversión guardado como constante
define("FACTOR_CM", 2.54);

$mensajeError = "";
$bloqueResultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Saneamiento del dato recibido
    $datoPulgadas = trim($_POST['pulgadas'] ?? '');

    // Validación: is_numeric() no basta, filter_var deja el número ya convertido a float
    $pulgadas = filter_var($datoPulgadas, FILTER_VALIDATE_FLOAT);

    // Una medida en pulgadas no puede ser negativa
    if ($pulgadas === false || $pulgadas < 0) {
        $mensajeError = "El dato \"" . htmlspecialchars($datoPulgadas, ENT_QUOTES, 'UTF-8') . "\" no es válido. "
                      . "Escriba un número mayor o igual a 0.";
    } else {
        $centimetros = $pulgadas * FACTOR_CM;

        $bloqueResultado = "El resultado es: " . htmlspecialchars($pulgadas)
                         . " pulgadas equivalen a " . round($centimetros, 2) . " centímetros.";
    }
}

if ($mensajeError !== "") {
    echo "<div class='aviso'>$mensajeError</div>";
} elseif ($bloqueResultado !== "") {
    echo "<div class='salida'>$bloqueResultado</div>";
}
?>
</body>
</html>
