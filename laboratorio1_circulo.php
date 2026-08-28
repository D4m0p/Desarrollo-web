<html>
<head><title>Laboratorio 1 - Área y perímetro de un círculo</title></head>
<body>
<h1>El área y perímetro de un círculo</h1>
<p>Área = &pi;r&sup2; &nbsp;&nbsp; Perímetro = 2&pi;r</p>

<form method="post" action="">
    Ingrese el radio de la circunferencia:
    <input type="text" name="radio">
    <input type="submit" value="Calcular">
</form>

<?php
if (isset($_POST['radio']) && is_numeric($_POST['radio'])) {
    $radio = $_POST['radio'];
    $area = pi() * $radio ** 2;
    $perimetro = 2 * pi() * $radio;

    echo "<p>El área de la circunferencia es: $area</p>";
    echo "<p>El perímetro de la circunferencia es: $perimetro</p>";
}
?>
</body>
</html>
