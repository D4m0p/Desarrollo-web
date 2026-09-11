<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Laboratorio 1 - Área y perímetro de un círculo</title>
<style>
    body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
    .caja { background: #fff; border: 1px solid #cfd8dc; border-radius: 6px; padding: 18px; max-width: 340px; }
    input[type="number"] { width: 100%; padding: 6px; margin: 6px 0 12px 0; box-sizing: border-box;
                           border: 1px solid #b0bec5; border-radius: 4px; }
    input[type="submit"] { width: 100%; padding: 8px; border: 0; border-radius: 4px;
                           background: #37474f; color: #fff; cursor: pointer; }
    input[type="submit"]:hover { background: #263238; }
    .salida { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #e3f2fd; border-left: 4px solid #1976d2; }
    .aviso  { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #fff3e0; border-left: 4px solid #e65100; color: #bf360c; }
    .figura { margin-bottom: 15px; text-align: center; }
</style>
</head>
<body>
<h1>El área y perímetro de un círculo</h1>
<p>Área = &pi;r&sup2; &nbsp;&nbsp; Perímetro = 2&pi;r</p>

<!-- Diagrama del círculo dibujado con SVG: el radio r va del centro al borde -->
<div class="caja figura">
<svg viewBox="0 0 270 200" width="270" height="200" role="img" aria-label="Círculo con su radio r">
    <circle cx="110" cy="100" r="80" fill="#e3f2fd" stroke="#1976d2" stroke-width="3" />
    <line x1="110" y1="100" x2="190" y2="100" stroke="#e65100" stroke-width="3" />
    <circle cx="110" cy="100" r="4" fill="#263238" />
    <text x="146" y="92" font-size="20" font-style="italic" fill="#e65100">r</text>
    <text x="110" y="145" font-size="16" text-anchor="middle" fill="#263238">A = &pi;r&sup2;</text>
    <text x="200" y="35" font-size="16" fill="#1976d2">P = 2&pi;r</text>
</svg>
</div>

<div class="caja">
<form method="post" action="">
    <label for="radio">Ingrese el radio de la circunferencia:</label>
    <!-- type="number", min y required hacen una primera revisión en el navegador;
         la validación del servidor (más abajo) se mantiene por si alguien la salta.
         value conserva el último radio enviado, pasado por htmlspecialchars() -->
    <input type="number" step="any" min="0.01" required name="radio" id="radio"
           value="<?php echo htmlspecialchars($_POST['radio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Calcular">
</form>
</div>

<?php
// Constante con el valor de PI (define() no se puede reasignar)
define("VALOR_PI", 3.14159265359);

$mensajeError = "";
$bloqueResultado = "";

// El cálculo solo corre cuando el formulario se envía por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Saneamiento: se eliminan los espacios sobrantes antes de revisar el dato
    $datoRadio = trim($_POST['radio'] ?? '');

    // Validación en el servidor: filter_var devuelve false si no es un número real
    $radio = filter_var($datoRadio, FILTER_VALIDATE_FLOAT);

    if ($radio === false || $radio <= 0) {
        // htmlspecialchars() evita que se ejecute HTML o JavaScript escrito por el usuario (XSS)
        $mensajeError = "El dato \"" . htmlspecialchars($datoRadio, ENT_QUOTES, 'UTF-8') . "\" no sirve como radio. "
                      . "Escriba un número mayor que 0.";
    } else {
        $area = VALOR_PI * $radio ** 2;
        $perimetro = 2 * VALOR_PI * $radio;

        // round() deja el resultado en 2 decimales para que sea legible
        $bloqueResultado = "Radio usado: " . htmlspecialchars($radio) . "<br>"
                         . "El área de la circunferencia es: " . round($area, 2) . "<br>"
                         . "El perímetro de la circunferencia es: " . round($perimetro, 2);
    }
}

// La lógica de arriba solo arma el texto; aquí abajo se imprime
if ($mensajeError !== "") {
    echo "<div class='aviso'>$mensajeError</div>";
} elseif ($bloqueResultado !== "") {
    echo "<div class='salida'>$bloqueResultado</div>";
}
?>
</body>
</html>
