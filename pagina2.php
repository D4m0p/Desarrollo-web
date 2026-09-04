<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del formulario</title>
    <style>
        body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
        .salida { max-width: 380px; padding: 12px; border-radius: 6px;
                  background: #e3f2fd; border-left: 4px solid #1976d2; }
        .aviso  { max-width: 380px; padding: 12px; border-radius: 6px;
                  background: #fff3e0; border-left: 4px solid #e65100; color: #bf360c; }
        .aviso ul { margin: 6px 0 0 18px; padding: 0; }
        a { display: inline-block; margin-top: 15px; color: #1976d2; }
    </style>
</head>
<body>
<h1>Resultado del formulario</h1>

<?php
// Esta página solo procesa datos enviados desde formulario.php (diapositivas 65-66)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<div class='aviso'>Esta página debe abrirse desde el formulario.</div>";
    echo "<a href='formulario.php'>Ir al formulario</a>";
    echo "</body></html>";
    exit;
}

// Aquí se van juntando todos los problemas encontrados
$listaErrores = [];

// --- Nombre ---
// trim() limpia los espacios; empty() detecta el campo en blanco
$Nombre = trim($_POST['nombre'] ?? '');
if (!is_string($Nombre) || empty($Nombre)) {
    $listaErrores[] = "Debe escribir su nombre, el campo no puede quedar vacío.";
}

// --- Edad ---
// FILTER_VALIDATE_INT rechaza texto y decimales; luego se revisa el rango
$datoEdad = trim($_POST['edad'] ?? '');
$Edad = filter_var($datoEdad, FILTER_VALIDATE_INT);
if ($Edad === false || $Edad < 0 || $Edad > 120) {
    $listaErrores[] = "La edad debe ser un número entero entre 0 y 120.";
}

// Si falló alguna validación se muestran todos los errores juntos
if (!empty($listaErrores)) {
    echo "<div class='aviso'>";
    echo "<strong>Revise los siguientes datos:</strong>";
    echo "<ul>";
    foreach ($listaErrores as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "</div>";
} else {
    // htmlspecialchars() en toda la salida para no imprimir HTML del usuario
    echo "<div class='salida'>";
    echo "El nombre es: " . htmlspecialchars($Nombre) . "<br>";
    echo "La edad es: " . htmlspecialchars($Edad) . "<br>";

    if ($Edad > 18) {
        echo "Usted puede votar en las próximas elecciones 2028.";
    } else {
        echo "Usted no es mayor de edad.";
    }
    echo "</div>";
}
?>

<a href="formulario.php">Volver al formulario</a>
</body>
</html>
