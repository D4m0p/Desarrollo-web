<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Problema #2 Laboratorio - Calculadora</title>
<style>
    body { font-family: "Segoe UI", Arial, sans-serif; background: #eceff1; color: #263238; padding: 25px; }
    .caja { background: #fff; border: 1px solid #cfd8dc; border-radius: 6px; padding: 18px; max-width: 340px; }
    label { font-weight: bold; display: block; }
    input[type="number"], select { width: 100%; padding: 6px; margin: 6px 0 12px 0; box-sizing: border-box;
                                   border: 1px solid #b0bec5; border-radius: 4px; }
    input[type="submit"] { width: 100%; padding: 8px; border: 0; border-radius: 4px;
                           background: #37474f; color: #fff; cursor: pointer; }
    input[type="submit"]:hover { background: #263238; }
    .salida { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #e3f2fd; border-left: 4px solid #1976d2; }
    .aviso  { max-width: 340px; margin-top: 15px; padding: 12px; border-radius: 6px;
              background: #fff3e0; border-left: 4px solid #e65100; color: #bf360c; }
    .aviso ul { margin: 6px 0 0 18px; padding: 0; }
</style>
</head>
<body>
<h1>Calculadora en PHP</h1>
<p>Sumar, restar, multiplicar y redondear decimales.</p>

<?php
// Operaciones permitidas: la clave es el value del <select> y el valor, el texto del resultado
$operaciones = [
    "sumar"       => "La suma",
    "restar"      => "La resta",
    "multiplicar" => "La multiplicación"
];

// Datos recibidos (vacíos la primera vez); también sirven para volver a llenar el formulario
$dato1 = trim($_POST['num1'] ?? '');
$dato2 = trim($_POST['num2'] ?? '');
$operacion = $_POST['operacion'] ?? 'sumar';
?>

<div class="caja">
<form method="post" action="">
    <label for="num1">Número 1:</label>
    <input type="number" step="any" required name="num1" id="num1"
           value="<?php echo htmlspecialchars($dato1, ENT_QUOTES, 'UTF-8'); ?>">

    <label for="num2">Número 2:</label>
    <input type="number" step="any" required name="num2" id="num2"
           value="<?php echo htmlspecialchars($dato2, ENT_QUOTES, 'UTF-8'); ?>">

    <label for="operacion">Operación:</label>
    <select name="operacion" id="operacion">
        <?php foreach ($operaciones as $valor => $texto) { ?>
            <option value="<?php echo $valor; ?>" <?php echo $valor === $operacion ? "selected" : ""; ?>><?php echo ucfirst($valor); ?></option>
        <?php } ?>
    </select>

    <input type="submit" value="Calcular">
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Aquí se juntan todos los problemas encontrados
    $errores = [];

    // filter_var() devuelve el número ya convertido, o false si el dato no es numérico
    $num1 = filter_var($dato1, FILTER_VALIDATE_FLOAT);
    $num2 = filter_var($dato2, FILTER_VALIDATE_FLOAT);

    if ($num1 === false) {
        $errores[] = "El número 1 no es válido.";
    }
    if ($num2 === false) {
        $errores[] = "El número 2 no es válido.";
    }
    // Se rechaza una operación que no esté en la lista (por ejemplo, si alguien modifica el <select>)
    if (!array_key_exists($operacion, $operaciones)) {
        $errores[] = "La operación elegida no es válida.";
    }

    if (!empty($errores)) {
        echo "<div class='aviso'><strong>Revise los siguientes datos:</strong><ul>";
        foreach ($errores as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul></div>";
    } else {
        switch ($operacion) {
            case 'sumar':
                $resultado = $num1 + $num2;
                break;
            case 'restar':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;
        }

        // round() deja el resultado en 2 decimales
        $resultado_redondeado = round($resultado, 2);

        echo "<div class='salida'>";
        echo $operaciones[$operacion] . " de " . htmlspecialchars($num1) . " y " . htmlspecialchars($num2)
           . " es: " . htmlspecialchars($resultado) . "<br>";
        echo "Resultado redondeado a 2 decimales: " . $resultado_redondeado;
        echo "</div>";
    }
}
?>
</body>
</html>
