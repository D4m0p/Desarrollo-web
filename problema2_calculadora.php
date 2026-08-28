<html>
<head><title>Problema #2 Laboratorio - Calculadora</title></head>
<body>
<h1>Calculadora en PHP</h1>
<p>Sumar, restar, multiplicar y redondear decimales.</p>

<form method="post" action="">
    Número 1: <input type="text" name="num1">
    Número 2: <input type="text" name="num2">
    <br><br>
    Operación:
    <select name="operacion">
        <option value="sumar">Sumar</option>
        <option value="restar">Restar</option>
        <option value="multiplicar">Multiplicar</option>
    </select>
    <input type="submit" value="Calcular">
</form>

<?php
if (isset($_POST['num1']) && isset($_POST['num2']) && is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];

    switch ($operacion) {
        case 'sumar':
            $resultado = $num1 + $num2;
            $texto = "La suma";
            break;
        case 'restar':
            $resultado = $num1 - $num2;
            $texto = "La resta";
            break;
        case 'multiplicar':
            $resultado = $num1 * $num2;
            $texto = "La multiplicación";
            break;
    }

    $resultado_redondeado = round($resultado, 2);

    echo "<p>$texto de $num1 y $num2 es: $resultado</p>";
    echo "<p>Resultado redondeado a 2 decimales: $resultado_redondeado</p>";
}
?>
</body>
</html>
