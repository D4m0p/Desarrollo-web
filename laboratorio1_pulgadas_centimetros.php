<html>
<head><title>Laboratorio 1 - Pulgadas a centímetros</title></head>
<body>
<h1>Convertir pulgadas a centímetros</h1>
<p>1 pulgada = 2.54 centímetros.</p>

<form method="post" action="">
    Leer las pulgadas:
    <input type="text" name="pulgadas">
    <input type="submit" value="Convertir">
</form>

<?php
if (isset($_POST['pulgadas']) && is_numeric($_POST['pulgadas'])) {
    $pulgadas = $_POST['pulgadas'];
    $centimetros = $pulgadas * 2.54;

    echo "<p>El resultado es: $pulgadas pulgadas equivalen a $centimetros centímetros.</p>";
}
?>
</body>
</html>
